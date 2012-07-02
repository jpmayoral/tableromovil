<?php 
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escenarios_Model extends CI_Model
{
	
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
		$this->db->insert('escenarios', $options);
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
		if(isset($options['escenarios_descripcion']))
			$this->db->set('escenarios_descripcion', $options['escenarios_descripcion']);
		if(isset($options['escenarios_estado']))
			$this->db->set('escenarios_estado', $options['escenarios_estado']);
		if(isset($options['escenarios_created_at']))
			$this->db->set('escenarios_created_at', $options['escenarios_created_at']);
		if(isset($options['escenarios_updated_at']))
			$this->db->set('escenarios_updated_at', $options['escenarios_updated_at']);
		if(isset($options['escenarios_iconpath']))
			$this->db->set('escenarios_iconpath', $options['escenarios_iconpath']);

		$this->db->where('escenarios_id', $options['escenarios_id']);

		$this->db->update('escenarios');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $escenarios_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($escenarios_id)
	{
		//code here
		$this->db->where('escenarios_id', $escenarios_id);
		$this->db->delete('escenarios');
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
		if(isset($options['escenarios_id']))
			$this->db->where('escenarios_id', $options['escenarios_id']);
		if(isset($options['escenarios_descripcion']))
			$this->db->like('escenarios_descripcion', $options['escenarios_descripcion']);
		if(isset($options['escenarios_estado']))
			$this->db->where('escenarios_estado', $options['escenarios_estado']);
		if(isset($options['escenarios_created_at']))
			$this->db->where('escenarios_created_at', $options['escenarios_created_at']);
		if(isset($options['escenarios_updated_at']))
			$this->db->where('escenarios_updated_at', $options['escenarios_updated_at']);
		if(isset($options['escenarios_iconpath']))
			$this->db->where('escenarios_iconpath', $options['escenarios_iconpath']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get("escenarios");

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['escenarios_id']) && $flag==1){
				$query->row(0)->escenarios_created_at = $this->basicrud->formatDateToHuman($query->row(0)->escenarios_created_at);
				$query->row(0)->escenarios_updated_at = $this->basicrud->formatDateToHuman($query->row(0)->escenarios_updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->escenarios_created_at = $this->basicrud->formatDateToHuman($row->escenarios_created_at);
					$row->escenarios_updated_at = $this->basicrud->formatDateToHuman($row->escenarios_updated_at);
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
		$fields[]='escenarios_id';
		$fields[]='escenarios_descripcion';
		$fields[]='escenarios_estado';
		$fields[]='escenarios_created_at';
		$fields[]='escenarios_updated_at';
		$fields[]='escenarios_iconpath';
		return $fields;
	}

}

?>