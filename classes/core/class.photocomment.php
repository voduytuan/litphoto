<?php

/**
 * Core/class.photocomment.php
 *
 * File contains the class used for PhotoComment Model
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Core_PhotoComment Class for photo feature
 */
Class Core_PhotoComment extends Core_Object
{
	const STATUS_PENDING = 1;
	const STATUS_COMPLETED = 2;
	
	public $pid = 0;	// Photo ID
	public $id = 0;
	public $fullname = '';
	public $email = '';
	public $website = '';
	public $text = '';
	public $status = 0;
	public $ipaddress = '';
	public $datecreated = 0;
	public $datemodified = 0;
	
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

		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'photo_comment (
					p_id,
					pc_fullname,
					pc_email,
					pc_website,
					pc_text,
					pc_status,
					pc_ipaddress,
					pc_datecreated
					)
		        VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(int)$this->pid,
					(string)$this->fullname,
					(string)$this->email,
					(string)$this->website,
					(string)$this->text,
					(int)$this->status,
					(int)Helper::getIpAddress(true),
					(int)$this->datecreated,
					))->rowCount();

		$this->id = $this->db->lastInsertId();
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
		
		$sql = 'UPDATE ' . TABLE_PREFIX . 'photo_comment
				SET pc_fullname = ?,
					pc_email = ?,
					pc_website = ?,
					pc_text = ?,
					pc_status = ?,
					pc_datemodified = ?
				WHERE pc_id = ?';

		$stmt = $this->db->query($sql, array(
					(string)$this->fullname,
					(string)$this->email,
					(string)$this->website,
					(string)$this->text,
					(int)$this->status,
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
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'photo_comment pc
				WHERE pc.pc_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->pid = $row['p_id'];
		$this->id = $row['pc_id'];             
		$this->fullname = $row['pc_fullname'];             
		$this->email = $row['pc_email'];   
		$this->website = $row['pc_website'];
		$this->text = $row['pc_text'];          
		$this->status = $row['pc_status'];
		$this->ipaddress = long2ip($row['pc_ipaddress']);        
		$this->datecreated = $row['pc_datecreated'];
		$this->datemodified = $row['pc_datemodified']; 
	}

	/**
	 * Delete current object from database, base on primary key
	 *
	 * @return int the number of deleted rows (in this case, if success is 1)
	 */
	public function delete()
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'photo_comment
				WHERE pc_id = ?';
		$rowCount = $this->db->query($sql, array($this->id))->rowCount();
		
		return $rowCount;
	}
	
	/**
	 * Delete all records from a photo id (called from deleting of a photo, called in Core_Photo)
	 *
	 * @return int the number of deleted rows
	 */
	public function deleteFromPhoto($photoid = 0)
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'photo_comment
				WHERE p_id = ?';
		$rowCount = $this->db->query($sql, array((int)$photoid))->rowCount();
		
		return $rowCount;
	}
    
    /**
     * Count the record in the table base on condition in $where
	 *
	 * @param string $where: the WHERE condition in SQL string.
     */
	public static function countList($where)
	{
		global $db;

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'photo_comment pc';
        
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
	 */
	public static function getList($where, $order, $limit = '')
	{
		global $db;

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'photo_comment pc';

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
			$myPhotoComment = new Core_PhotoComment();
			$myPhotoComment->pid = $row['p_id'];
			$myPhotoComment->id = $row['pc_id'];             
			$myPhotoComment->fullname = $row['pc_fullname'];             
			$myPhotoComment->email = $row['pc_email'];   
			$myPhotoComment->website = $row['pc_website'];
			$myPhotoComment->text = $row['pc_text'];          
			$myPhotoComment->status = $row['pc_status'];
			$myPhotoComment->ipaddress = long2ip($row['pc_ipaddress']);        
			$myPhotoComment->datecreated = $row['pc_datecreated'];
			$myPhotoComment->datemodified = $row['pc_datemodified'];
			
            $outputList[] = $myPhotoComment;			
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
	 * 
	 */
	public static function getComments($formData, $sortby, $sorttype, $limit = '', $countOnly = false)
	{
		$whereString = '';
		
		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_id = '.(int)$formData['fid'].' ';
		
		if($formData['fphotoid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.p_id = '.(int)$formData['fphotoid'].' ';
		
		if(isset($formData['fstatus']))
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_status = '.(int)$formData['fstatus'].' ';
		
		if(strlen($formData['fkeywordFilter']) > 0)
		{
			$formData['fkeywordFilter'] = Helper::plaintext($formData['fkeywordFilter']);
			
			if($formData['fsearchKeywordIn'] == 'fullname')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_fullname LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			elseif($formData['fsearchKeywordIn'] == 'email')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_email LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			elseif($formData['fsearchKeywordIn'] == 'website')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_website LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			elseif($formData['fsearchKeywordIn'] == 'text')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_text LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			else
			{
				$whereString .= ($whereString != '' ? ' AND ' : '') . ' (pc.pc_fullname LIKE \'%'.$formData['fkeywordFilter'].'%\' OR pc.pc_email LIKE \'%'.$formData['fkeywordFilter'].'%\' OR pc.pc_website LIKE \'%'.$formData['fkeywordFilter'].'%\' OR pc.pc_text LIKE \'%'.$formData['fkeywordFilter'].'%\')';
			}
		}
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'DESC';
			
		if($sortby == 'status')
			$orderString = ' pc.pc_status ' . $sorttype;    
		else
			$orderString = ' pc.pc_id ' . $sorttype;   
			
		if($countOnly)
			return self::countList($whereString);
		else
			return self::getList($whereString, $orderString, $limit);
	}
	
	/**
	 * Return the List of status and string to populate the status select form in administrator
	 */
	public function getStatusList()
	{
		$statusList = array();
		
		$statusList[self::STATUS_PENDING] = 'Pending';
		$statusList[self::STATUS_COMPLETED] = 'Completed';
		
		return $statusList;
	}
	
	/**
	 * Check status of current object
	 * 
	 * @param string $status: The status to check with. There are two option: pending | completed
	 * @return boolean
	 */
	public function isStatus($status)
	{
		$status = strtolower($status);
		
		if($status == 'pending')
			return $this->status == self::STATUS_PENDING;
		elseif($status == 'completed')
			return $this->status == self::STATUS_COMPLETED;
		else
			return false;
	}

   
}