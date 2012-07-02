<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salidad_Model extends CI_Model {

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
		$this->db->insert('salidad', $options);
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
		if(isset($options['salidad_relay']))
			$this->db->set('salidad_relay', $options['salidad_relay']);
		if(isset($options['salidad_value']))
			$this->db->set('salidad_value', $options['salidad_value']);
		if(isset($options['salidad_modulo']))
			$this->db->set('salidad_modulo', $options['salidad_modulo']);
		if(isset($options['salidad_descripcion']))
			$this->db->set('salidad_descripcion', $options['salidad_descripcion']);
		if(isset($options['salidad_created_at']))
			$this->db->set('salidad_created_at', $options['salidad_created_at']);
		/*if(isset($options['salidad_updated_at']))
			$this->db->set('salidad_updated_at', $options['salidad_updated_at']);*/
		if(isset($options['salidad_estado']))
			$this->db->set('salidad_estado', $options['salidad_estado']);
		if(isset($options['sismenu_id']))
			$this->db->set('sismenu_id', $options['sismenu_id']);
		if(isset($options['salidad_iconon']))
			$this->db->set('salidad_iconon', $options['salidad_iconon']);
		if(isset($options['salidad_iconoff']))
			$this->db->set('salidad_iconoff', $options['salidad_iconoff']);

		$this->db->where('salidad_id', $options['salidad_id']);

		$this->db->update('salidad');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $salidad_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($salidad_id)
	{
		//code here
		$this->db->where('salidad_id', $salidad_id);
		$this->db->delete('salidad');
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
		if(isset($options['salidad_id']))
			$this->db->where('salidad_id', $options['salidad_id']);
		if(isset($options['salidad_relay']))
			$this->db->like('salidad_relay', $options['salidad_relay']);
		if(isset($options['salidad_value']))
			$this->db->where('salidad_value', $options['salidad_value']);
		if(isset($options['salidad_modulo']))
			$this->db->where('salidad_modulo', $options['salidad_modulo']);
		if(isset($options['salidad_descripcion']))
			$this->db->like('salidad_descripcion', $options['salidad_descripcion']);
		if(isset($options['salidad_created_at']))
			$this->db->where('salidad_created_at', $options['salidad_created_at']);
		if(isset($options['salidad_updated_at']))
			$this->db->where('salidad_updated_at', $options['salidad_updated_at']);
		if(isset($options['sismenu_id']))
			$this->db->where('sismenu_id', $options['sismenu_id']);
		if(isset($options['salidad_estado']))
			$this->db->where('salidad_estado', $options['salidad_estado']);
		if(isset($options['salidad_iconon']))
			$this->db->where('salidad_iconon', $options['salidad_iconon']);
		if(isset($options['salidad_iconoff']))
			$this->db->where('salidad_iconoff', $options['salidad_iconoff']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('salidad');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['salidad_id']) && $flag==1){
				$query->row(0)->salidad_created_at = $this->basicrud->formatDateToHuman($query->row(0)->salidad_created_at);
				$query->row(0)->salidad_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->salidad_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->salidad_created_at = $this->basicrud->formatDateToHuman($row->salidad_created_at);
					$row->salidad_updated_at = $this->basicrud->formatDateToHuman($row->salidad_updated_at);
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
		$fields[]='salidad_id';
		$fields[]='salidad_relay';
		$fields[]='salidad_value';
		$fields[]='salidad_modulo';
		$fields[]='salidad_descripcion';
		$fields[]='salidad_created_at';
		$fields[]='salidad_updated_at';
		$fields[]='sismenu_id';
		$fields[]='salidad_estado';
		$fields[]='salidad_iconon';
		$fields[]='salidad_iconoff';
		return $fields;
	}

}