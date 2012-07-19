<?php

/**
 * Short description for file
 *
 * Long description for file (if any)...
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Example Model to follow
 * 
 * This class is the model for a Example table with following structure 
 * (this table is not real table in Litpi Database, just show here for example purpose)
 * 
	CREATE TABLE `lit_example` (
	  `e_id` int(11) NOT NULL AUTO_INCREMENT,
	  `e_title` varchar(255) NOT NULL,
	  `e_description` text NOT NULL,
	  `e_authorid` int(11) NOT NULL,
	  `e_datecreated` int(10) NOT NULL,
	  PRIMARY KEY (`e_id`)
	) ENGINE=MyISAM;
 *
 */
Class Core_Example extends Core_Object
{
	public $id = 0;
	public $title = '';
	public $description = '';
	public $authorid = 0;
	public $datecreated = 0;
	
	public $actor = null;	// Author object of foreign key authorid, relationship with table `lit_ac_user`
	
	
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

		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'example (
					e_id,
					e_title,
					e_description,
					e_authorid,
					e_datecreated
					)
		        VALUES(?, ?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(int)$this->id,
					(string)$this->title,
					(string)$this->description,
					(int)$this->authorid,
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
		$sql = 'UPDATE ' . TABLE_PREFIX . 'example
				SET e_title = ?,
					e_description = ?
				WHERE e_id = ?';

		$stmt = $this->db->query($sql, array(
					(string)$this->title,
					(string)$this->description,
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
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'example e
				INNER JOIN ' . TABLE_PREFIX . 'ac_user u ON e.e_authori = u.u_id
				WHERE e.e_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->id = $row['e_id'];             
		$this->title = $row['e_title'];             
		$this->description = $row['e_description'];             
		$this->authorid = $row['e_authorid'];                    
		$this->datecreated = $row['e_datecreated'];
		          
		$this->actor = new Core_User();
		$this->actor->initMainInfo($row);           
	}

	/**
	 * Delete current object from database, base on primary key
	 *
	 * @return int the number of deleted rows (in this case, if success is 1)
	 */
	public function delete()
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'example
				WHERE e_id = ?';
		$rowCount = $this->db->query($sql, array($this->id))->rowCount();

		return $rowCount;
	}
    
    /**
     * Count the record in the table base on condition in $where
	 *
	 * @param string $where: the WHERE condition in SQL string.
	 * @param boolean $getUserDetail: flag to join with table lit_ac_user or not, for performance when joining too many tables.
     */
	public static function countList($where, $getUserDetail = false)
	{
		global $db;

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'example e';
        		
		if($getUserDetail)
			$sql .= ' INNER JOIN ' . TABLE_PREFIX . 'ac_user u ON e.e_authorid = u.u_id';
        
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
	public static function getList($where, $order, $limit = '', $getUserDetail = false)
	{
		global $db;

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'example e';

		if($getUserDetail)
			$sql .= ' INNER JOIN ' . TABLE_PREFIX . 'ac_user u ON e.e_authorid = u.u_id';

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
			$myExample = new Core_Example();
			$myExample->id = $row['e_id'];
			$myExample->title = $row['e_title'];
			$myExample->description = $row['e_description'];
			$myExample->authorid = $row['e_authorid'];
			$myExample->datecreated = $row['datecreated'];

			if($getUserDetail)
			{
				$myExample->actor = new Core_User();
				$myExample->actor->initMainInfo($row);
			}       
            $outputList[] = $myExample;
        }
        return $outputList;
    }
   
	/**
	 * Select the record, Interface with the outside (Controller)
	 *
	 * @param array $formData : filter array to build WHERE condition
	 * @param string $sortby : indicating the order of select
	 * @param string $sorttype : DESC or ASC
	 * @param string $limit: the limit string, offset for LIMIT in SQL string
	 * @param boolean $countOnly: flag to counting or return datalist
	 * @param boolean $getUserDetail: flag to join with table lit_ac_user or not, for performance when joining too many tables.
	 * 
	 */
	public static function getItems($formData, $sortby, $sorttype, $limit = '', $countOnly = false, $getUserDetail = false)
	{
		$whereString = '';
		
		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'e.e_id = '.(int)$formData['fid'].' ';
		
		if($formData['fauthorid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'e.e_authorid = '.(int)$formData['fauthorid'].' ';
		
		if(strlen($formData['fkeywordFilter']) > 0)
		{
			$formData['fkeywordFilter'] = Helper::plaintext($formData['fkeywordFilter']);
			
			if($formData['fsearchKeywordIn'] == 'title')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'e.e_title LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			else
			{
				$whereString .= ($whereString != '' ? ' AND ' : '') . ' (e.e_title LIKE \'%'.$formData['fkeywordFilter'].'%\' OR  e.e_description LIKE \'%'.$formData['fkeywordFilter'].'%\')';
			}
		}
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'DESC';
			
		if($sortby == 'authorid')
			$orderString = ' e.e_authorid ' . $sorttype;    
		else
			$orderString = ' e.e_id ' . $sorttype;   
			
		if($countOnly)
			return self::countList($whereString, $getUserDetail);
		else
			return self::getList($whereString, $orderString, $limit, $getUserDetail);
	}

   
}