<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novedades_Model extends CI_Model {

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
		$this->db->insert('novedades', $options);
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
		if(isset($options['novedades_fecha']))
			$this->db->set('novedades_fecha', $options['novedades_fecha']);
		if(isset($options['novedades_descripcion']))
			$this->db->set('novedades_descripcion', $options['novedades_descripcion']);
		if(isset($options['novedades_estado']))
			$this->db->set('novedades_estado', $options['novedades_estado']);
		if(isset($options['novedades_tipo']))
			$this->db->set('novedades_tipo', $options['novedades_tipo']);
		if(isset($options['novedades_leido']))
			$this->db->set('novedades_leido', $options['novedades_leido']);

		$this->db->where('novedades_id', $options['novedades_id']);

		$this->db->update('novedades');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $novedades_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($novedades_id)
	{
		//code here
		$this->db->where('novedades_id', $novedades_id);
		$this->db->delete('novedades');
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
		if(isset($options['novedades_id']))
			$this->db->where('novedades_id', $options['novedades_id']);
		if(isset($options['novedades_fecha']))
			$this->db->where('novedades_fecha', $options['novedades_fecha']);
		if(isset($options['novedades_descripcion']))
			$this->db->like('novedades_descripcion', $options['novedades_descripcion']);
		if(isset($options['novedades_estado']))
			$this->db->where('novedades_estado', $options['novedades_estado']);
		if(isset($options['novedades_tipo']))
			$this->db->where('novedades_tipo', $options['novedades_tipo']);
		if(isset($options['novedades_leido']))
			$this->db->where('novedades_leido', $options['novedades_leido']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("n.*, novedades_fecha as novedades_fechaexacta, tg.tabgral_descripcion as novedades_estado_descripcion");
		$this->db->from('novedades as n');
		$this->db->join("tabgral as tg","tg.tabgral_id = n.novedades_estado");
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['novedades_id']) && $flag==1){
				$query->row(0)->novedades_fechaexacta = $this->basicrud->timesince($query->row(0)->novedades_fechaexacta);
				$query->row(0)->novedades_fecha = $this->basicrud->formatDateToHuman($query->row(0)->novedades_fecha);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->novedades_fechaexacta = $this->basicrud->timesince($row->novedades_fechaexacta);
					$row->novedades_fecha = $this->basicrud->formatDateToHuman($row->novedades_fecha);
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
		$fields[]='novedades_id';
		$fields[]='novedades_fecha';
		$fields[]='novedades_fechaexacta';
		$fields[]='novedades_descripcion';
		$fields[]='novedades_estado';
		$fields[]='novedades_estado_descripcion';
		$fields[]='novedades_tipo';
		$fields[]='novedades_leido';
		return $fields;
	}

}