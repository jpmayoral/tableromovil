<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playlist_Model extends CI_Model {

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
		$this->db->insert('playlist', $options);
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
		if(isset($options['playlist_descripcion']))
			$this->db->set('playlist_descripcion', $options['playlist_descripcion']);
		if(isset($options['usuarios_id']))
			$this->db->set('usuarios_id', $options['usuarios_id']);
		if(isset($options['playlist_created_at']))
			$this->db->set('playlist_created_at', $options['playlist_created_at']);
		if(isset($options['playlist_updated_at']))
			$this->db->set('playlist_updated_at', $options['playlist_updated_at']);

		$this->db->where('playlist_id', $options['playlist_id']);

		$this->db->update('playlist');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $playlist_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($playlist_id)
	{
		//code here
		$this->db->where('playlist_id', $playlist_id);
		$this->db->delete('playlist');
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
		if(isset($options['playlist_id']))
			$this->db->where('playlist_id', $options['playlist_id']);
		if(isset($options['playlist_descripcion']))
			$this->db->like('playlist_descripcion', $options['playlist_descripcion']);
		if(isset($options['usuarios_id']))
			$this->db->where('usuarios_id', $options['usuarios_id']);
		if(isset($options['playlist_created_at']))
			$this->db->where('playlist_created_at', $options['playlist_created_at']);
		if(isset($options['playlist_updated_at']))
			$this->db->where('playlist_updated_at', $options['playlist_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('playlist');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['playlist_id']) && $flag==1){
				$query->row(0)->playlist_created_at = $this->basicrud->formatDateToHuman($query->row(0)->playlist_created_at);
				$query->row(0)->playlist_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->playlist_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->playlist_created_at = $this->basicrud->formatDateToHuman($row->playlist_created_at);
					$row->playlist_updated_at = $this->basicrud->formatDateToHuman($row->playlist_updated_at);
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
		$fields[]='playlist_id';
		$fields[]='playlist_descripcion';
		$fields[]='usuarios_id';
		$fields[]='playlist_created_at';
		$fields[]='playlist_updated_at';
		return $fields;
	}

}