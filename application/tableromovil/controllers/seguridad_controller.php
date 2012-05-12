<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Seguridad_Controller extends CI_Controller
{
	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;
	
	function __construct()
	{
		parent::__construct();		
		if($this->session->userdata('logged_in') == TRUE) {
				$data['flags'] = $this->basicauth->getPermissions('entradad');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
				$this->load->model('entradad_model');
		}
	}

	function index()
	{
		//code here
		$data['title_header']='Seguridad';
		$this->load->view('default/_header', $data);
		$data["rows_entradad"] = $this->entradad_model->get_m(array("entradad_modulo" => 8)); //filtrar solo los relay del modulo de agua	
		$this->load->view('seguridad_view/home_seguridad',$data);
		$this->load->view('default/_footer');
	}

	function search_c($offset = 0)
	{
		$data["rows_entradad"] = $this->entradad_model->get_m(array("entradad_modulo" => 8)); //filtrar solo los relay del modulo de agua	
		$this->load->view('seguridad_view/record_list_seguridad', $data);
	}

}