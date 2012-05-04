<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iluconfig_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}


	/**
	 * This function saving the data in the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @return integer  affected rows
	 */
	function add_m($options = array())
	{
		//code here
		$this->db->insert('iluconfig', $options);
		return $this->db->insert_id();
	}


	/**
	 * This function editing the data in the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @return integer  affected rows
	 */
	function edit_m($options = array())
	{
		//code here
		if(isset($options['iluconfig_descripcion']))
			$this->db->set('iluconfig_descripcion', $options['iluconfig_descripcion']);
		if(isset($options['salidad_id']))
			$this->db->set('salidad_id', $options['salidad_id']);
		if(isset($options['iluconfig_created_at']))
			$this->db->set('iluconfig_created_at', $options['iluconfig_created_at']);
		if(isset($options['iluconfig_updated_at']))
			$this->db->set('iluconfig_updated_at', $options['iluconfig_updated_at']);

		$this->db->where('iluconfig_id', $options['iluconfig_id']);

		$this->db->update('iluconfig');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $iluconfig_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($iluconfig_id)
	{
		//code here
		$this->db->where('iluconfig_id', $iluconfig_id);
		$this->db->delete('iluconfig');
		return $this->db->affected_rows();
	}


	/**
	 * This function get the data of the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @param integer	flag to indicate if return one record or more of one record
	 * @return array  result
	 */
	function get_m($options = array(),$flag=0)
	{
		//code here
		if(isset($options['iluconfig_id']))
			$this->db->where('i.iluconfig_id', $options['iluconfig_id']);
		if(isset($options['iluconfig_descripcion']))
			$this->db->like('i.iluconfig_descripcion', $options['iluconfig_descripcion']);
		if(isset($options['salidad_id']))
			$this->db->where('i.salidad_id', $options['salidad_id']);
		if(isset($options['iluconfig_created_at']))
			$this->db->where('i.iluconfig_created_at', $options['iluconfig_created_at']);
		if(isset($options['iluconfig_updated_at']))
			$this->db->where('i.iluconfig_updated_at', $options['iluconfig_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("i.*, sd.salidad_relay, sd.salidad_value");
		$this->db->from("iluconfig as i");
		$this->db->join("salidad as sd","sd.salidad_id = i.salidad_id");
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['iluconfig_id']) && $flag==1){
				$query->row(0)->iluconfig_created_at = $this->basicrud->formatDateToHuman($query->row(0)->iluconfig_created_at);
				$query->row(0)->iluconfig_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->iluconfig_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->iluconfig_created_at = $this->basicrud->formatDateToHuman($row->iluconfig_created_at);
					$row->iluconfig_updated_at = $this->basicrud->formatDateToHuman($row->iluconfig_updated_at);
				}
				return $query->result();
			}
		}

	}


	/**
	 * This function getting all the fields of the table
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getFieldsTable_m()
	{
		//code here
		$fields=array();
		$fields[]='iluconfig_id';
		$fields[]='iluconfig_descripcion';
		$fields[]='salidad_id';
		$fields[]='iluconfig_created_at';
		$fields[]='iluconfig_updated_at';
		return $fields;
	}

}