<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Salidadg_Controller extends CI_Controller
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
			$this->load->model('perfiles_model');
			$this->load->model('salidad_model');
			$this->load->model('sisperfil_model');
			$this->load->model('tabgral_model');	
			$this->load->model('sismenu_model');	

			$data['flags'] = $this->basicauth->getPermissions('salidad');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r' => $this->flagR, 'i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
		}
	}

	function index($sismenu_id)
	{
		//code here
		if($sismenu_id){
			$sismenu = $this->sismenu_model->get_m(array('sismenu_id' => $sismenu_id));
			if($sismenu){
				$data['title_header'] = $sismenu[0]->sismenu_descripcion;
				$data['sismenu_id'] = $sismenu[0]->sismenu_id;
				$this->load->view('default/_header',$data);
				//filtrar solo los relay del modulo generico y del menu con id $sismenu_id		
				$data["rows_salidad"] = $this->salidad_model->get_m(array("salidad_modulo" => 11, 'salidad_estado' => 2 ,'sismenu_id' => $sismenu[0]->sismenu_id));
				if($data["rows_salidad"]){ 
					$this->load->view('salidadg_view/home_salidadg', $data);
					$this->load->view('default/_footer');	
				}
			}			
		}
	}

	
	function search_c($sismenu_id)
	{
		//filtrar solo los relay del modulo generico y del menu con id $sismenu_id	
		if($sismenu_id){	
			$data["rows_salidad"] = $this->salidad_model->get_m(array("salidad_modulo" => 11, 'salidad_estado' => 2, 'sismenu_id' => $sismenu_id)); 
			if($data["rows_salidad"])
				$this->load->view('salidadg_view/record_list_salidadg', $data);
		}
	}

}