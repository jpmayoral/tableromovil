<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salidad_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('salidad_model');
			$this->load->model('tabgral_model');
			$this->config->load('salidad_settings');
			$data['flags'] = $this->basicauth->getPermissions('salidad');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r'=>$this->flagR,'i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here	
		$this->search_c();
	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for saving 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function add_c()
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordAddTitle');
		$this->form_validation->set_rules('salidad_id', 'salidad_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('salidad_relay', 'salidad_relay', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('salidad_value', 'salidad_value', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('salidad_modulo', 'salidad_modulo', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('salidad_descripcion', 'salidad_descripcion', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_salidad  = array();
			$data_salidad['salidad_relay'] = $this->input->post('salidad_relay');
			$data_salidad['salidad_modulo'] = $this->input->post('salidad_modulo');
			$data_salidad['salidad_descripcion'] = $this->input->post('salidad_descripcion');
			$data_salidad['salidad_updated_at'] = $this->basicrud->formatDateToBD();

			$id_salidad = $this->salidad_model->add_m($data_salidad);
			if($id_salidad){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('salidad_flash_add_message')); 
				redirect('salidad_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('salidad_flash_error_message')); 
				redirect('salidad_controller','location');
			}
		}
		$this->load->view('salidad_view/form_add_salidad',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($salidad_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');

		$data['salidad'] = $this->salidad_model->get_m(array('salidad_id' => $salidad_id),$flag=1);
		
		$this->form_validation->set_rules('salidad_id', 'salidad_id', 'trim|integer|required|xss_clean');
		$this->form_validation->set_rules('salidad_modulo', 'salidad_modulo', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('salidad_descripcion', 'salidad_descripcion', 'trim|required|alpha_numeric|xss_clean');

		if($this->form_validation->run()){
			$data_salidad  = array();
			$data_salidad['salidad_id'] = $this->input->post('salidad_id');
			$data_salidad['salidad_modulo'] = $this->input->post('salidad_modulo');
			$data_salidad['salidad_descripcion'] = $this->input->post('salidad_descripcion');
			$data_salidad['salidad_updated_at'] = $this->basicrud->formatDateToBD();

			if($this->salidad_model->edit_m($data_salidad)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('salidad_flash_edit_message')); 
				redirect('salidad_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('salidad_flash_error_message')); 
				redirect('salidad_controller','location');
			}
		}else{
			//filtrar todos los modulos de tabgral
			$data["modulos"] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 3));
			$this->load->view('salidad_view/form_edit_salidad',$data);
		}

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function editfast_c($salidad_id, $salidad_value)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		
		$data_salidad['salidad_id'] = $salidad_id;
		$data_salidad['salidad_value'] = $salidad_value;
		$data_salidad['salidad_updated_at'] = $this->basicrud->formatDateToBD();

		if($this->salidad_model->edit_m($data_salidad)){ 
			echo "ok";
		}else{
			echo "Error";
		}
	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $salidad_id id of record
	 * @return void
	 */
	function delete_c($salidad_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->salidad_model->delete_m($salidad_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('salidad_flash_delete_message')); 
			redirect('salidad_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('salidad_flash_error_delete_message')); 
			redirect('salidad_controller','location');
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
		$data_search_salidad = array(); 

		$data_search_salidad['offset'] = $offset;
		$data_search_salidad['sortBy'] = 'salidad_id';
		$data_search_salidad['sortDirection'] = 'asc';

		$data['salidad'] = $this->salidad_model->get_m($data_search_salidad);

		$data['flag'] = $this->flags;
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->salidad_model->getFieldsTable_m());

		$data['title_header'] = 'Salidas digitales';
		$this->load->view('salidad_view/home_salidad', $data);
		$this->load->view('salidad_view/record_list_salidad');
		$this->load->view('default/_footer');
		

	}

}