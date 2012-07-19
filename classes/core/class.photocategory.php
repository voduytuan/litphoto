<?php

/**
 * Core/class.photocategory.php
 *
 * File contains the class used for PhotoCategory Model
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Core_PhotoCategory Class for photo category feature
 */
Class Core_PhotoCategory extends Core_Object
{
	public $id = 0;
	public $title = '';
	public $slug = '';
	public $description = '';
	public $enable = 0;
	public $displayorder = 0;
	public $parentid = 0;
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
		$this->displayorder = $this->getOrder();
        $this->datecreated = time();


		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'photo_category (
					pc_title,
					pc_slug,
					pc_description,
					pc_enable,
					pc_displayorder,
					pc_parentid,
					pc_datecreated
					)
		        VALUES(?, ?, ?, ?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(string)$this->title,
					(string)$this->slug,
					(string)$this->description,
					(int)$this->enable,
					(int)$this->displayorder,
					(int)$this->parentid,
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
		
		$sql = 'UPDATE ' . TABLE_PREFIX . 'photo_category
				SET pc_title = ?,
					pc_slug = ?,
					pc_description = ?,
					pc_enable = ?,
					pc_displayorder = ?,
					pc_parentid = ?,
					pc_datemodified = ?
				WHERE pc_id = ?';

		$stmt = $this->db->query($sql, array(
					(string)$this->title,
					(string)$this->slug,
					(string)$this->description,
					(int)$this->enable,
					(int)$this->displayorder,
					(int)$this->parentid,
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
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'photo_category pc
				WHERE pc.pc_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->id = $row['pc_id'];             
		$this->title = $row['pc_title'];  
		$this->slug = $row['pc_slug'];           
		$this->description = $row['pc_description'];   
		$this->enable = $row['pc_enable'];
		$this->displayorder = $row['pc_displayorder'];          
		$this->parentid = $row['pc_parentid'];
		$this->datecreated = $row['pc_datecreated'];
		$this->datemodified = $row['pc_datemodified'];          
	}
	
	public function getDataByArray($row)
	{
		$this->id = $row['pc_id'];             
		$this->title = $row['pc_title'];  
		$this->slug = $row['pc_slug'];           
		$this->description = $row['pc_description'];   
		$this->enable = $row['pc_enable'];
		$this->displayorder = $row['pc_displayorder'];          
		$this->parentid = $row['pc_parentid'];
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
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'photo_category
				WHERE pc_id = ?';
		$rowCount = $this->db->query($sql, array($this->id))->rowCount();
		
		//delete all subs
		$subs = $this->getSub();
		foreach($subs as $sub)
		{
			$sub->delete();
		}
		
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

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'photo_category pc';
        
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
	public static function getList($where, $order, $limit = '', $getSub = false)
	{
		global $db;

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'photo_category pc';

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
			$myPhotoCategory = new Core_PhotoCategory();
			$myPhotoCategory->id = $row['pc_id'];             
			$myPhotoCategory->title = $row['pc_title'];             
			$myPhotoCategory->slug = $row['pc_slug'];           
			$myPhotoCategory->description = $row['pc_description'];   
			$myPhotoCategory->enable = $row['pc_enable'];
			$myPhotoCategory->displayorder = $row['pc_displayorder'];          
			$myPhotoCategory->parentid = $row['pc_parentid'];
			$myPhotoCategory->datecreated = $row['pc_datecreated'];
			$myPhotoCategory->datemodified = $row['pc_datemodified'];
			
			if($getSub)
				$myPhotoCategory->sub = $myPhotoCategory->getSub();
				
            $outputList[] = $myPhotoCategory;
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
	public static function getCategories($formData, $sortby, $sorttype, $limit = '', $countOnly = false, $getSub = false)
	{
		$whereString = '';
		
		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_id = '.(int)$formData['fid'].' ';
		
		if(isset($formData['fparentid']))
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_parentid = '.(int)$formData['fparentid'].' ';
		
		if($formData['fenable'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'pc.pc_enable = '.(int)$formData['fenable'].' ';
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'ASC';
			
		if($sortby == 'title')
			$orderString = ' pc.pc_title ' . $sorttype;    
		elseif($sortby == 'slug')
			$orderString = ' pc.pc_slug ' . $sorttype;    
		elseif($sortby == 'parentid')
			$orderString = ' pc.pc_parentid ' . $sorttype;    
		else
			$orderString = ' pc.pc_displayorder ' . $sorttype;   
			
		if($countOnly)
			return self::countList($whereString);
		else
			return self::getList($whereString, $orderString, $limit, $getSub);
	}
	
	public function getSub($getSub = false)
	{
		return $this->getCategories(array('fparentid' => $this->id), '', '', '', false, $getSub);
	}
	
	private function getOrder()
	{
		$sql = 'SELECT MAX(pc_displayorder) FROM ' . TABLE_PREFIX . 'photo_category';
		return $this->db->query($sql)->fetchSingle() + 1;
	}
	
	/**
	* Recursive get all category tree
	* 
	* @param mixed $parentId
	* @param mixed $level
	* @param mixed $prefix
	* @param mixed $formData
	* @return array
	*/
	public static function getFullCategories($parentId = '0', $level = 0, $prefix='', $formData = array())
	{
		global $db, $registry;
		$output = array();

		$sql = 'SELECT * 
				FROM ' . TABLE_PREFIX . 'photo_category pc
				WHERE pc_parentid = ?
				ORDER BY pc_displayorder';
		$categoryList = $db->query($sql, array($parentId))->fetchAll();
		$level++;
		foreach($categoryList as $category)
		{
			
			$prefixTemp = $prefix . ' &raquo; ' . $category['pc_title'];
			$myPhotoCategory = new Core_PhotoCategory();
            
			$myPhotoCategory->level = $level;
			$myPhotoCategory->id = $category['pc_id'];
			$myPhotoCategory->title = $category['pc_title'];
			$myPhotoCategory->slug = $category['pc_slug'];
			$myPhotoCategory->description = $category['pc_description'];
			$myPhotoCategory->enable = $category['pc_enable'];
			$myPhotoCategory->displayorder = $category['pc_displayorder'];
			$myPhotoCategory->parentid = $category['pc_parentid'];

			
			$output[] = $myPhotoCategory;
			$output = array_merge($output, self::getFullCategories($category['pc_id'], $level, $prefixTemp, $formData));
		}
		
		return $output;
	}
	
	public function getPhotoCategoryPath()
	{
		global $registry;
		
		$slug = '';
		if($this->slug != '')
			$slug = $this->slug;
		else
			$slug = Helper::codau2khongdau($this->title, true, true);
			
		$url = $registry->conf['rooturl'] . $slug . '-c' . $this->id;
		return $url;
	}
   
}