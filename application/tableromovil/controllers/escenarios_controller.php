<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Escenarios_Controller extends CI_Controller
{
	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('perfiles_model');
		$this->load->model('sisperfil_model');
		$this->load->model('tabgral_model');		
		if($this->session->userdata('logged_in') == TRUE) {
				$data['flags'] = $this->basicauth->getPermissions('perfiles');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
		}
	}

	function index()
	{
		//code here
		$data['title_header']='Escenarios';
		$this->load->view('default/_header', $data);
		$this->load->view('escenarios_view/home_escenarios');
		$this->load->view('default/_footer');
	}

	/*
	function search_c($offset = 0)
	{
			echo "hola";
			//$this->load->view('agua_view/home_agua');
	}*/

}