<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playlistlinea_Model extends CI_Model {

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
		$this->db->insert('playlistlinea', $options);
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
		if(isset($options['playlistlinea_path']))
			$this->db->set('playlistlinea_path', $options['playlistlinea_path']);
		if(isset($options['playlistlinea_namesong']))
			$this->db->set('playlistlinea_namesong', $options['playlistlinea_namesong']);
		if(isset($options['playlist_id']))
			$this->db->set('playlist_id', $options['playlist_id']);
		if(isset($options['playlistlinea_created_at']))
			$this->db->set('playlistlinea_created_at', $options['playlistlinea_created_at']);
		if(isset($options['playlistlinea_updated_at']))
			$this->db->set('playlistlinea_updated_at', $options['playlistlinea_updated_at']);

		$this->db->where('playlistlinea_id', $options['playlistlinea_id']);

		$this->db->update('playlistlinea');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $playlistlinea_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($playlistlinea_id)
	{
		//code here
		$this->db->where('playlistlinea_id', $playlistlinea_id);
		$this->db->delete('playlistlinea');
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
		if(isset($options['playlistlinea_id']))
			$this->db->where('playlistlinea_id', $options['playlistlinea_id']);
		if(isset($options['playlistlinea_path']))
			$this->db->like('playlistlinea_path', $options['playlistlinea_path']);
		if(isset($options['playlistlinea_namesong']))
			$this->db->like('playlistlinea_namesong', $options['playlistlinea_namesong']);
		if(isset($options['playlist_id']))
			$this->db->where('playlist_id', $options['playlist_id']);
		if(isset($options['playlistlinea_created_at']))
			$this->db->where('playlistlinea_created_at', $options['playlistlinea_created_at']);
		if(isset($options['playlistlinea_updated_at']))
			$this->db->where('playlistlinea_updated_at', $options['playlistlinea_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('playlistlinea');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['playlistlinea_id']) && $flag==1){
				$query->row(0)->playlistlinea_created_at = $this->basicrud->formatDateToHuman($query->row(0)->playlistlinea_created_at);
				$query->row(0)->playlistlinea_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->playlistlinea_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->playlistlinea_created_at = $this->basicrud->formatDateToHuman($row->playlistlinea_created_at);
					$row->playlistlinea_updated_at = $this->basicrud->formatDateToHuman($row->playlistlinea_updated_at);
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
		$fields[]='playlistlinea_id';
		$fields[]='playlistlinea_path';
		$fields[]='playlistlinea_namesong';
		$fields[]='playlist_id';
		$fields[]='playlistlinea_created_at';
		$fields[]='playlistlinea_updated_at';
		return $fields;
	}

}