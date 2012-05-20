<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cameras_Model extends CI_Model {

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
		$this->db->insert('cameras', $options);
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
		if(isset($options['cameras_descripcion']))
			$this->db->set('cameras_descripcion', $options['cameras_descripcion']);
		if(isset($options['cameras_url']))
			$this->db->set('cameras_url', $options['cameras_url']);
		if(isset($options['cameras_port']))
			$this->db->set('cameras_port', $options['cameras_port']);
		if(isset($options['cameras_estado']))
			$this->db->set('cameras_estado', $options['cameras_estado']);
		if(isset($options['cameras_user']))
			$this->db->set('cameras_user', $options['cameras_user']);
		if(isset($options['cameras_password']))
			$this->db->set('cameras_password', $options['cameras_password']);
		if(isset($options['cameras_created_at']))
			$this->db->set('cameras_created_at', $options['cameras_created_at']);
		if(isset($options['cameras_updated_at']))
			$this->db->set('cameras_updated_at', $options['cameras_updated_at']);

		$this->db->where('cameras_id', $options['cameras_id']);

		$this->db->update('cameras');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $cameras_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($cameras_id)
	{
		//code here
		$this->db->where('cameras_id', $cameras_id);
		$this->db->delete('cameras');
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
		if(isset($options['cameras_id']))
			$this->db->where('cameras_id', $options['cameras_id']);
		if(isset($options['cameras_descripcion']))
			$this->db->like('cameras_descripcion', $options['cameras_descripcion']);
		if(isset($options['cameras_url']))
			$this->db->like('cameras_url', $options['cameras_url']);
		if(isset($options['cameras_port']))
			$this->db->like('cameras_port', $options['cameras_port']);
		if(isset($options['cameras_estado']))
			$this->db->where('cameras_estado', $options['cameras_estado']);
		if(isset($options['cameras_user']))
			$this->db->like('cameras_user', $options['cameras_user']);
		if(isset($options['cameras_password']))
			$this->db->like('cameras_password', $options['cameras_password']);
		if(isset($options['cameras_created_at']))
			$this->db->where('cameras_created_at', $options['cameras_created_at']);
		if(isset($options['cameras_updated_at']))
			$this->db->where('cameras_updated_at', $options['cameras_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("c.*, tg.tabgral_descripcion as cameras_estado_descripcion");
		$this->db->from("cameras as c");
		$this->db->join("tabgral as tg", "tg.tabgral_id = c.cameras_estado");
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['cameras_id']) && $flag==1){
				$query->row(0)->cameras_created_at = $this->basicrud->formatDateToHuman($query->row(0)->cameras_created_at);
				$query->row(0)->cameras_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->cameras_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->cameras_created_at = $this->basicrud->formatDateToHuman($row->cameras_created_at);
					$row->cameras_updated_at = $this->basicrud->formatDateToHuman($row->cameras_updated_at);
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
		$fields[]='cameras_id';
		$fields[]='cameras_descripcion';
		$fields[]='cameras_url';
		$fields[]='cameras_port';
		$fields[]='cameras_estado';
		$fields[]='cameras_estado_descripcion';
		$fields[]='cameras_user';
		$fields[]='cameras_password';
		$fields[]='cameras_created_at';
		$fields[]='cameras_updated_at';
		return $fields;
	}

}