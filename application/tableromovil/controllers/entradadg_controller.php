<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Entradadg_Controller extends CI_Controller
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
			$this->load->model('entradad_model');
			$this->load->model('sisperfil_model');
			$this->load->model('tabgral_model');	
			$this->load->model('sismenu_model');	

			$data['flags'] = $this->basicauth->getPermissions('entradad');
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
		if($this->flagR)
		{
			if($sismenu_id){
				$sismenu = $this->sismenu_model->get_m(array('sismenu_id' => $sismenu_id));
				if($sismenu){
					$data['title_header'] = $sismenu[0]->sismenu_descripcion;
					$data['sismenu_id'] = $sismenu[0]->sismenu_id;
					$this->load->view('default/_header',$data);
					//filtrar solo los relay del modulo generico y del menu con id $sismenu_id		
					$data["rows_entradad"] = $this->entradad_model->get_m(array("entradad_modulo" => 11, 'entradad_estado' => 2, 'sismenu_id' => $sismenu[0]->sismenu_id));
					if($data["rows_entradad"]){ 
						$data['flag'] = $this->flags;
						$this->load->view('entradadg_view/home_entradadg', $data);
						$this->load->view('default/_footer');	
					}
				}			
			}
		}else{
			show_404();
            return;
		}
	}

	
	function search_c($sismenu_id)
	{
		//filtrar solo los relay del modulo generico y del menu con id $sismenu_id	
		if($this->flagR)
		{
			if($sismenu_id){
				$data['flag'] = $this->flags;	
				$data["rows_entradad"] = $this->entradad_model->get_m(array("entradad_modulo" => 11, 'entradad_estado' => 2, 'sismenu_id' => $sismenu_id)); 
				if($data["rows_entradad"])
					$this->load->view('entradadg_view/record_list_entradadg', $data);
			}
		}else{
			show_404();
            return;
		}
	}

}