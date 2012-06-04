<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Btncameras_Model extends CI_Model {

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
		$this->db->insert('btncameras', $options);
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
		if(isset($options['btncameras_nombre']))
			$this->db->set('btncameras_nombre', $options['btncameras_nombre']);
		if(isset($options['btncameras_label']))
			$this->db->set('btncameras_label', $options['btncameras_label']);
		if(isset($options['btncameras_url']))
			$this->db->set('btncameras_url', $options['btncameras_url']);
		if(isset($options['salidad_id']))
			$this->db->set('salidad_id', $options['salidad_id']);
		if(isset($options['cameras_id']))
			$this->db->set('cameras_id', $options['cameras_id']);
		if(isset($options['btncameras_created_at']))
			$this->db->set('btncameras_created_at', $options['btncameras_created_at']);
		if(isset($options['btncameras_updated_at']))
			$this->db->set('btncameras_updated_at', $options['btncameras_updated_at']);

		$this->db->where('btncameras_id', $options['btncameras_id']);

		$this->db->update('btncameras');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $btncameras_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($btncameras_id)
	{
		//code here
		$this->db->where('btncameras_id', $btncameras_id);
		$this->db->delete('btncameras');
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
		if(isset($options['btncameras_id']))
			$this->db->where('btn.btncameras_id', $options['btncameras_id']);
		if(isset($options['btncameras_nombre']))
			$this->db->like('btn.btncameras_nombre', $options['btncameras_nombre']);
		if(isset($options['btncameras_label']))
			$this->db->like('btn.btncameras_label', $options['btncameras_label']);
		if(isset($options['btncameras_url']))
			$this->db->like('btn.btncameras_url', $options['btncameras_url']);
		if(isset($options['salidad_id']))
			$this->db->where('btn.salidad_id', $options['salidad_id']);
		if(isset($options['cameras_id']))
			$this->db->where('btn.cameras_id', $options['cameras_id']);
		if(isset($options['btncameras_created_at']))
			$this->db->where('btn.btncameras_created_at', $options['btncameras_created_at']);
		if(isset($options['btncameras_updated_at']))
			$this->db->where('btn.btncameras_updated_at', $options['btncameras_updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("btn.*, sd.salidad_descripcion, sd.salidad_relay, sd.salidad_modulo, c.cameras_descripcion, 
			tg.tabgral_descripcion as salidad_modulo_descripcion");
		$this->db->from("btncameras as btn");
		$this->db->join("salidad as sd","sd.salidad_id = btn.salidad_id");
		$this->db->join("cameras as c","c.cameras_id = btn.cameras_id");
		$this->db->join("tabgral as tg","tg.tabgral_id = sd.salidad_modulo");

		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['btncameras_id']) && $flag==1){
				$query->row(0)->btncameras_created_at = $this->basicrud->formatDateToHuman($query->row(0)->btncameras_created_at);
				$query->row(0)->btncameras_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->btncameras_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->btncameras_created_at = $this->basicrud->formatDateToHuman($row->btncameras_created_at);
					$row->btncameras_updated_at = $this->basicrud->formatDateToHuman($row->btncameras_updated_at);
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
		$fields[]='btncameras_id';
		$fields[]='btncameras_nombre';
		$fields[]='btncameras_label';
		$fields[]='btncameras_url';
		$fields[]='salidad_id';
		$fields[]='salidad_relay';
		$fields[]='salidad_descripcion';
		$fields[]='salidad_modulo';
		$fields[]='salidad_modulo_descripcion';
		$fields[]='cameras_id';
		$fields[]='cameras_descripcion';
		$fields[]='btncameras_created_at';
		$fields[]='btncameras_updated_at';
		return $fields;
	}

}