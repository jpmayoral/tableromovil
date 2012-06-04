<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Clima_Controller extends CI_Controller
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
				//$this->load->model('perfiles_model');
				//$this->load->model('salidad_model');
				//$this->load->model('sisperfil_model');
				//$this->load->model('tabgral_model');	

				/*$data['flags'] = $this->basicauth->getPermissions('salidad');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('r' => $this->flagR, 'i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);*/
		}
	}

	function index()
	{
		//code here
		//$data['title_header']='Agua';
		//$this->load->view('default/_header',$data);
		//$data["rows_salidad"] = $this->salidad_model->get_m(array("salidad_modulo" => 7)); //filtrar solo los relay del modulo de agua		
		$this->load->view('clima_view/rss_clima');
		//$this->load->view('default/_footer');
	}

}
