<?php

/**
 * Core/class.photo.php
 *
 * File contains the class used for Photo Model
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Core_Photo Class for photo feature
 */
Class Core_Photo extends Core_Object
{
	public $uid = 0;	// Uploader UID
	public $pcid = 0;	// Photo Category ID
	public $id = 0;
	public $title = '';
	public $description = '';
	public $filepath = '';
	public $enable = 0;		// Enable (=show) or not
	public $countcomment = 0;	//De-normalized of counting from photo comment table
	public $datecreated = 0;
	public $datemodified = 0;
	
	public $actor = null;
	public $category = null;
	
    public function __construct($id = 0)
	{
		parent::__construct();
    
		if($id > 0)
			$this->getData($id);
	}
    
	/**
	 * Insert object data to database
	 * @return int The inserted record primary key
	 */
    public function addData()
    {
        $this->datecreated = time();

		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'photo (
					u_id,
					pc_id,
					p_title,
					p_description,
					p_filepath,
					p_enable,
					p_datecreated
					)
		        VALUES(?, ?, ?, ?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(int)$this->uid,
					(int)$this->pcid,
					(string)$this->title,
					(string)$this->description,
					(string)$this->filepath,
					(int)$this->enable,
					(int)$this->datecreated,
					))->rowCount();

		$this->id = $this->db->lastInsertId();
		
		if($this->id > 0)
		{
			if(strlen($_FILES['fimage']['name']) > 0)
            {
                //upload image
                $uploadImageResult = $this->uploadImage();
                
                if($uploadImageResult != Uploader::ERROR_UPLOAD_OK)
                    return false;
                elseif($this->filepath != '')
                {      
                    //update source
                    $sql = 'UPDATE ' . TABLE_PREFIX . 'photo
                            SET p_filepath = ?
                            WHERE p_id = ?';
                    $result=$this->db->query($sql, array($this->filepath, $this->id));
                    if(!$result)
                    	return false;
                }
            }
		}
		
		return $this->id;
	}
	
	/**
	 * Update database
	 * 
	 * @return boolean Indicate query success or not
	 */
	public function updateData()
	{                   
		$this->datemodified = time();
		
		$sql = 'UPDATE ' . TABLE_PREFIX . 'photo
				SET pc_id = ?,
					p_title = ?,
					p_description = ?,
					p_filepath = ?,
					p_enable = ?,
					p_countcomment = ?,
					p_datemodified = ?
				WHERE p_id = ?';

		$stmt = $this->db->query($sql, array(
					(int)$this->pcid,
					(string)$this->title,
					(string)$this->description,
					(string)$this->filepath,
					(int)$this->enable,
					(int)$this->countcomment,
					(int)$this->datemodified,
					(int)$this->id
					));

		if($stmt)
			return true;
		else
			return false;
	}
   
	/**
	 * Get the object data base on primary key
	 * @param int $id : the primary key value for searching record.
	 */
	public function getData($id)
	{
		$id = (int)$id;
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'photo p
				INNER JOIN ' . TABLE_PREFIX . 'ac_user u ON p.u_id = u.u_id
				WHERE p.p_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->uid = $row['u_id'];
		$this->pcid = $row['pc_id'];
		$this->id = $row['p_id'];             
		$this->title = $row['p_title'];             
		$this->description = $row['p_description'];   
		$this->filepath = $row['p_filepath'];
		$this->enable = $row['p_enable'];          
		$this->countcomment = $row['p_countcomment'];
		$this->datecreated = $row['p_datecreated'];
		$this->datemodified = $row['p_datemodified'];
		          
		$this->actor = new Core_User();
		$this->actor->initMainInfo($row);           
	}
	
	public function getDataByArray($row)
	{
		$this->uid = $row['u_id'];
		$this->pcid = $row['pc_id'];
		$this->id = $row['p_id'];             
		$this->title = $row['p_title'];             
		$this->description = $row['p_description'];   
		$this->filepath = $row['p_filepath'];
		$this->enable = $row['p_enable'];          
		$this->countcomment = $row['p_countcomment'];
		$this->datecreated = $row['p_datecreated'];
		$this->datemodified = $row['p_datemodified'];       
	}

	/**
	 * Delete current object from database, base on primary key
	 *
	 * @return int the number of deleted rows (in this case, if success is 1)
	 */
	public function delete()
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'photo
				WHERE p_id = ?';
		$rowCount = $this->db->query($sql, array($this->id))->rowCount();
		
		//delete image cover
        $this->deleteImage();
		
		// Also delete all comment of this photo
		Core_PhotoComment::deleteFromPhoto($this->id);

		return $rowCount;
	}
    
    /**
     * Count the record in the table base on condition in $where
	 *
	 * @param string $where: the WHERE condition in SQL string.
	 * @param boolean $getUserDetail: flag to join with table lit_ac_user or not, for performance when joining too many tables.
     */
	public static function countList($where, $getUserDetail = false, $getCategoryDetail = false)
	{
		global $db;

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'photo p';
        		
		if($getUserDetail)
			$sql .= ' INNER JOIN ' . TABLE_PREFIX . 'ac_user u ON p.u_id = u.u_id';
        
		if($getCategoryDetail)
			$sql .= ' INNER JOIN ' . TABLE_PREFIX . 'photo_category pc ON pc.pc_id = p.pc_id';

		if($where != '')
			$sql .= ' WHERE ' . $where;

		return $db->query($sql)->fetchSingle();
	}

	/**
	 * Get the record in the table with paginating and filtering
	 *
	 * @param string $where the WHERE condition in SQL string
	 * @param string $order the ORDER in SQL string
	 * @param string $limit the LIMIT in SQL string
	 * @param boolean $getUserDetail: flag to join with table lit_ac_user or not, for performance when joining too many tables.
	 */
	public static function getList($where, $order, $limit = '', $getUserDetail = false, $getCategoryDetail = false)
	{
		global $db;

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'photo p';

		if($getUserDetail)
			$sql .= ' INNER JOIN ' . TABLE_PREFIX . 'ac_user u ON p.u_id = u.u_id';

		if($getCategoryDetail)
			$sql .= ' INNER JOIN ' . TABLE_PREFIX . 'photo_category pc ON pc.pc_id = p.pc_id';

		if($where != '')
			$sql .= ' WHERE ' . $where;

		if($order != '')
			$sql .= ' ORDER BY ' . $order;

		if($limit != '')
			$sql .= ' LIMIT ' . $limit;
			
		$outputList = array();
		$stmt = $db->query($sql);
		while($row = $stmt->fetch())
		{
			$myPhoto = new Core_Photo();
			$myPhoto->uid = $row['u_id'];
			$myPhoto->pcid = $row['pc_id'];
			$myPhoto->id = $row['p_id'];             
			$myPhoto->title = $row['p_title'];             
			$myPhoto->description = $row['p_description'];   
			$myPhoto->filepath = $row['p_filepath'];
			$myPhoto->enable = $row['p_enable'];          
			$myPhoto->countcomment = $row['p_countcomment'];
			$myPhoto->datecreated = $row['p_datecreated'];
			$myPhoto->datemodified = $row['p_datemodified'];
			if($getUserDetail)
			{
				$myPhoto->actor = new Core_User();
				$myPhoto->actor->initMainInfo($row);
			}    
			
			if($getCategoryDetail)
			{
				$myPhoto->category = new Core_PhotoCategory();
				$myPhoto->category->getDataByArray($row);
			}   
			
            $outputList[] = $myPhoto;
        }
        return $outputList;
    }
   
	/**
	 * Select the record, Interface with the outside (Controller Action)
	 *
	 * @param array $formData : filter array to build WHERE condition
	 * @param string $sortby : indicating the order of select
	 * @param string $sorttype : DESC or ASC
	 * @param string $limit: the limit string, offset for LIMIT in SQL string
	 * @param boolean $countOnly: flag to counting or return datalist
	 * @param boolean $getUserDetail: flag to join with table lit_ac_user or not, for performance when joining too many tables.
	 * 
	 */
	public static function getPhotos($formData, $sortby, $sorttype, $limit = '', $countOnly = false, $getUserDetail = false, $getCategoryDetail = false)
	{
		$whereString = '';
		
		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'p.p_id = '.(int)$formData['fid'].' ';
		
		if($formData['fuserid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'p.u_id = '.(int)$formData['fuserid'].' ';
		
		if($formData['fcategory'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'p.pc_id = '.(int)$formData['fcategory'].' ';
		
		if(!empty($formData['fcategorylist']))
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'p.pc_id IN ( '.implode(',', $formData['fcategorylist']).' )';
		
		if($formData['fenable'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'p.p_enable = '.(int)$formData['fenable'].' ';
		
		if(strlen($formData['fkeywordFilter']) > 0)
		{
			$formData['fkeywordFilter'] = Helper::plaintext($formData['fkeywordFilter']);
			
			if($formData['fsearchKeywordIn'] == 'title')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'p.p_title LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			else
			{
				$whereString .= ($whereString != '' ? ' AND ' : '') . ' (p.p_title LIKE \'%'.$formData['fkeywordFilter'].'%\' OR  p.p_description LIKE \'%'.$formData['fkeywordFilter'].'%\')';
			}
		}
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'DESC';
			
		if($sortby == 'category')
			$orderString = ' p.pc_id ' . $sorttype;    
		elseif($sortby == 'user')
			$orderString = ' p.u_id ' . $sorttype;    
		elseif($sortby == 'enable')
			$orderString = ' p.p_enable ' . $sorttype;    
		elseif($sortby == 'comment')
			$orderString = ' p.p_countcomment ' . $sorttype;    
		else
			$orderString = ' p.p_id ' . $sorttype;   
			
		if($countOnly)
			return self::countList($whereString, $getUserDetail, $getCategoryDetail);
		else
			return self::getList($whereString, $orderString, $limit, $getUserDetail, $getCategoryDetail);
	}

	public function uploadImage()
    {
        global $registry;
        
        $curDateDir = Helper::getCurrentDateDirName(); 
        $extPart = substr(strrchr($_FILES['fimage']['name'],'.'),1);
        $namePart =  Helper::codau2khongdau($this->title, true) . '-' . $this->id . time();
        $name = $namePart . '.' . $extPart;
        $uploader = new Uploader($_FILES['fimage']['tmp_name'], $name, $registry->setting['photo']['imageDirectory'] . $curDateDir, '');
        
        $uploadError = $uploader->upload(false, $name);
        if($uploadError != Uploader::ERROR_UPLOAD_OK)
        {
            return $uploadError;
        }
        else
        {
            //Resize big image if needed
            $myImageResizer = new ImageResizer( $registry->setting['photo']['imageDirectory'] . $curDateDir, $name, 
                                                $registry->setting['photo']['imageDirectory'] . $curDateDir, $name, 
                                                $registry->setting['photo']['imageMaxWidth'], 
                                                $registry->setting['photo']['imageMaxHeight'], 
                                                '', 
                                                $registry->setting['photo']['imageQuality']);
            $myImageResizer->output();    
            unset($myImageResizer);
            
			//Create medium image
            $nameMediumPart = substr($name, 0, strrpos($name, '.'));
            $nameMedium = $nameMediumPart . '-medium.' . $extPart;
            $myImageResizer = new ImageResizer(    $registry->setting['photo']['imageDirectory'] . $curDateDir, $name, 
                                                $registry->setting['photo']['imageDirectory'] . $curDateDir, $nameMedium, 
                                                $registry->setting['photo']['imageMediumWidth'], 
                                                $registry->setting['photo']['imageMediumHeight'], 
                                                '', 
                                                $registry->setting['photo']['imageQuality']);
            $myImageResizer->output();    
            unset($myImageResizer);

            //Create thum image
            $nameThumbPart = substr($name, 0, strrpos($name, '.'));
            $nameThumb = $nameThumbPart . '-small.' . $extPart;
            $myImageResizer = new ImageResizer(    $registry->setting['photo']['imageDirectory'] . $curDateDir, $name, 
                                                $registry->setting['photo']['imageDirectory'] . $curDateDir, $nameThumb, 
                                                $registry->setting['photo']['imageThumbWidth'], 
                                                $registry->setting['photo']['imageThumbHeight'], 
                                                $registry->setting['photo']['imageThumbRatio'], 
                                                $registry->setting['photo']['imageQuality']);
            $myImageResizer->output();    
            unset($myImageResizer);

            //update database                
            $this->filepath = $curDateDir . $name;
        }
    }

	public function deleteImage($imagepath = '')
    {
        global $registry;
        
        //delete current image
        if($imagepath == '')
            $deletefile = $this->filepath;
		else
            $deletefile = $imagepath;
		
        if(strlen($deletefile) > 0)
        {
            $file = $registry->setting['photo']['imageDirectory'] . $deletefile;
            if(file_exists($file) && is_file($file))
            {
                @unlink($file);
                
                //get small image name
	            $pos = strrpos($deletefile, '.');
				$extPart = substr($deletefile, $pos+1);
				$namePart =  substr($deletefile,0, $pos);
				
				$deletesmallimage = $namePart . '-small.' . $extPart;
				$file = $registry->setting['photo']['imageDirectory'] . $deletesmallimage;
	            if(file_exists($file) && is_file($file))
	                @unlink($file);
	
				$deletemediumimage = $namePart . '-medium.' . $extPart;
				$file = $registry->setting['photo']['imageDirectory'] . $deletemediumimage;
	            if(file_exists($file) && is_file($file))
	                @unlink($file);
			}
			
            //delete current image
            if($imagepath == '')
                $this->filepath = '';
        }
    }


	public function getSmallImage()
	{
		global $registry;
		
		$pos = strrpos($this->filepath, '.');
		$extPart = substr($this->filepath, $pos+1);
		$namePart =  substr($this->filepath,0, $pos);
		$filesmall = $namePart . '-small.' . $extPart;	
		
		$url = $registry->conf['rooturl'] . $registry->setting['photo']['imageDirectory'] . $filesmall;		
		return $url;
	}
	
	public function getMediumImage()
	{
		global $registry;
		
		$pos = strrpos($this->filepath, '.');
		$extPart = substr($this->filepath, $pos+1);
		$namePart =  substr($this->filepath,0, $pos);
		$filemedium = $namePart . '-medium.' . $extPart;	
		
		$url = $registry->conf['rooturl'] . $registry->setting['photo']['imageDirectory'] . $filemedium;		
		return $url;
	}
	
	public function getImage()
	{
		global $registry;
		
		$url = $registry->conf['rooturl'] . $registry->setting['photo']['imageDirectory'] . $this->filepath;	
		return $url;	
	}
	
	/**
	 * Sync & correct the comment count column from counting the photocomment table
	 */
	public function refreshCountcomment()
	{
		$count = Core_PhotoComment::getComments(array('fphotoid' => $this->id), '', '', '', true);
		if($count != $this->countcomment)
		{
			$this->countcomment = $count;
			return $this->updateData();
		}
		
		return true;
	}
	
	public function getPhotoPath()
	{
		global $registry;
		
		$slug = Helper::codau2khongdau($this->title, true, true);
			
		$url = $registry->conf['rooturl'] . $slug . '-' . $this->id;
		return $url;
	}
   
}