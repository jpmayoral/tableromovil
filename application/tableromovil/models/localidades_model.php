<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localidades_Model extends CI_Model {

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
		$this->db->insert('localidades', $options);
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
		if(isset($options['localidades_nombre']))
			$this->db->set('localidades_nombre', $options['localidades_nombre']);
		if(isset($options['localidades_codpostal']))
			$this->db->set('localidades_codpostal', $options['localidades_codpostal']);
		if(isset($options['provincias_id']))
			$this->db->set('provincias_id', $options['provincias_id']);
		if(isset($options['localidades_created_at']))
			$this->db->set('localidades_created_at', $options['localidades_created_at']);
		if(isset($options['localidades_updated_at']))
			$this->db->set('localidades_updated_at', $options['localidades_updated_at']);

		$this->db->where('localidades_id', $options['localidades_id']);

		$this->db->update('localidades');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $localidades_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($localidades_id)
	{
		//code here
		$this->db->where('localidades_id', $localidades_id);
		$this->db->delete('localidades');
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
		if(isset($options['localidades_id']))
			$this->db->where('localidades_id', $options['localidades_id']);
		if(isset($options['localidades_nombre']))
			$this->db->like('localidades_nombre', $options['localidades_nombre']);
		if(isset($options['localidades_codpostal']))
			$this->db->where('localidades_codpostal', $options['localidades_codpostal']);
		if(isset($options['provincias_id']))
			$this->db->where('provincias_id', $options['provincias_id']);
		if(isset($options['localidades_created_at']))
			$this->db->where('localidades_created_at', $options['localidades_created_at']);
		if(isset($options['localidades_updated_at']))
			$this->db->where('localidades_updated_at', $options['localidades_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('localidades');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['localidades_id']) && $flag==1){
				$query->row(0)->localidades_created_at = $this->basicrud->formatDateToHuman($query->row(0)->localidades_created_at);
				$query->row(0)->localidades_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->localidades_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->localidades_created_at = $this->basicrud->formatDateToHuman($row->localidades_created_at);
					$row->localidades_updated_at = $this->basicrud->formatDateToHuman($row->localidades_updated_at);
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
		$fields[]='localidades_id';
		$fields[]='localidades_nombre';
		$fields[]='localidades_codpostal';
		$fields[]='provincias_id';
		$fields[]='localidades_created_at';
		$fields[]='localidades_updated_at';
		return $fields;
	}

}