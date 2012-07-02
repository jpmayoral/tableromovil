<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entradad_Model extends CI_Model {

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
		$this->db->insert('entradad', $options);
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
		if(isset($options['entradad_din']))
			$this->db->set('entradad_din', $options['entradad_din']);
		if(isset($options['entradad_value']))
			$this->db->set('entradad_value', $options['entradad_value']);
		if(isset($options['entradad_modulo']))
			$this->db->set('entradad_modulo', $options['entradad_modulo']);
		if(isset($options['entradad_descripcion']))
			$this->db->set('entradad_descripcion', $options['entradad_descripcion']);
		if(isset($options['entradad_created_at']))
			$this->db->set('entradad_created_at', $options['entradad_created_at']);
		if(isset($options['entradad_updated_at']))
			$this->db->set('entradad_updated_at', $options['entradad_updated_at']);
		if(isset($options['sismenu_id']))
			$this->db->set('sismenu_id', $options['sismenu_id']);
		if(isset($options['entradad_estado']))
			$this->db->set('entradad_estado', $options['entradad_estado']);
		if(isset($options['entradad_iconon']))
			$this->db->set('entradad_iconon', $options['entradad_iconon']);
		if(isset($options['entradad_iconoff']))
			$this->db->set('entradad_iconoff', $options['entradad_iconoff']);

		$this->db->where('entradad_id', $options['entradad_id']);

		$this->db->update('entradad');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $entradad_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($entradad_id)
	{
		//code here
		$this->db->where('entradad_id', $entradad_id);
		$this->db->delete('entradad');
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
		if(isset($options['entradad_id']))
			$this->db->where('entradad_id', $options['entradad_id']);
		if(isset($options['entradad_din']))
			$this->db->like('entradad_din', $options['entradad_din']);
		if(isset($options['entradad_value']))
			$this->db->where('entradad_value', $options['entradad_value']);
		if(isset($options['entradad_modulo']))
			$this->db->where('entradad_modulo', $options['entradad_modulo']);
		if(isset($options['entradad_descripcion']))
			$this->db->like('entradad_descripcion', $options['entradad_descripcion']);
		if(isset($options['entradad_created_at']))
			$this->db->where('entradad_created_at', $options['entradad_created_at']);
		if(isset($options['entradad_updated_at']))
			$this->db->where('entradad_updated_at', $options['entradad_updated_at']);
		if(isset($options['sismenu_id']))
			$this->db->where('sismenu_id', $options['sismenu_id']);
		if(isset($options['entradad_estado']))
			$this->db->where('entradad_estado', $options['entradad_estado']);
		if(isset($options['entradad_iconon']))
			$this->db->where('entradad_iconon', $options['entradad_iconon']);
		if(isset($options['entradad_iconoff']))
			$this->db->where('entradad_iconoff', $options['entradad_iconoff']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('entradad');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['entradad_id']) && $flag==1){
				$query->row(0)->entradad_created_at = $this->basicrud->formatDateToHuman($query->row(0)->entradad_created_at);
				$query->row(0)->entradad_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->entradad_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->entradad_created_at = $this->basicrud->formatDateToHuman($row->entradad_created_at);
					$row->entradad_updated_at = $this->basicrud->formatDateToHuman($row->entradad_updated_at);
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
		$fields[]='entradad_id';
		$fields[]='entradad_din';
		$fields[]='entradad_value';
		$fields[]='entradad_modulo';
		$fields[]='entradad_descripcion';
		$fields[]='entradad_created_at';
		$fields[]='entradad_updated_at';
		$fields[]='sismenu_id';
		$fields[]='entradad_estado';
		$fields[]='entradad_iconon';
		$fields[]='entradad_iconoff';
		return $fields;
	}

}