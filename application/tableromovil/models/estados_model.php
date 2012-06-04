<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estados_Model extends CI_Model {

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
		$this->db->insert('estados', $options);
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
		if(isset($options['estados_descripcion']))
			$this->db->set('estados_descripcion', $options['estados_descripcion']);
		if(isset($options['estados_created_at']))
			$this->db->set('estados_created_at', $options['estados_created_at']);
		if(isset($options['estados_updated_at']))
			$this->db->set('estados_updated_at', $options['estados_updated_at']);

		$this->db->where('estados_id', $options['estados_id']);

		$this->db->update('estados');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $estados_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($estados_id)
	{
		//code here
		$this->db->where('estados_id', $estados_id);
		$this->db->delete('estados');
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
		if(isset($options['estados_id']))
			$this->db->where('estados_id', $options['estados_id']);
		if(isset($options['estados_descripcion']))
			$this->db->like('estados_descripcion', $options['estados_descripcion']);
		if(isset($options['estados_created_at']))
			$this->db->where('estados_created_at', $options['estados_created_at']);
		if(isset($options['estados_updated_at']))
			$this->db->where('estados_updated_at', $options['estados_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('estados');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['estados_id']) && $flag==1){
				$query->row(0)->estados_created_at = $this->basicrud->formatDateToHuman($query->row(0)->estados_created_at);
				$query->row(0)->estados_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->estados_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->estados_created_at = $this->basicrud->formatDateToHuman($row->estados_created_at);
					$row->estados_updated_at = $this->basicrud->formatDateToHuman($row->estados_updated_at);
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
		$fields[]='estados_id';
		$fields[]='estados_descripcion';
		$fields[]='estados_created_at';
		$fields[]='estados_updated_at';
		return $fields;
	}

}