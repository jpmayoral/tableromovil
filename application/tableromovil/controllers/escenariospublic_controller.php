<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Escenariospublic_Controller extends CI_Controller
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
				$data['flags'] = $this->basicauth->getPermissions('escenarios');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('r' => $this->flagR,'i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
				$this->load->model('escenarios_model');
				$this->config->load('escenarios_settings');	
		}
	}

	function index()
	{
		//code here	
		if($this->flagD){
			$this->search_c();
		}
	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_escenarios = array(); 

		$data_search_escenarios['offset'] = $offset;
		$data_search_escenarios['sortBy'] = 'escenarios_id';
		$data_search_escenarios['sortDirection'] = 'asc';

		$data['escenarios'] = $this->escenarios_model->get_m($data_search_escenarios);
		$data['flag'] = $this->flags;

		$data['title_header'] = 'Escenarios';
		$this->load->view('escenarios_view/home_escenarios_public', $data);
		$this->load->view('escenarios_view/record_list_escenarios_public');
		$this->load->view('default/_footer');
		
	}

}