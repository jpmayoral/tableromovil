<?php 

/**
* 
*/
class Escenarios_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getEscenarios()
	{
		$query = $this->db->get('escenarios');
		return $query->result();
	}

}

?>