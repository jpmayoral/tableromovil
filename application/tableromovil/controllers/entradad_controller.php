<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entradad_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 		
			$this->load->model('entradad_model');
			$this->load->model('tabgral_model');
			$this->config->load('entradad_settings');
			$data['flags'] = $this->basicauth->getPermissions('entradad');
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
		$this->form_validation->set_rules('entradad_din', 'entradad_din', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('entradad_modulo', 'entradad_modulo', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('entradad_descripcion', 'entradad_descripcion', 'trim|required|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_entradad  = array();
			$data_entradad['entradad_din'] = $this->input->post('entradad_din');
			$data_entradad['entradad_modulo'] = $this->input->post('entradad_modulo');
			$data_entradad['entradad_descripcion'] = $this->input->post('entradad_descripcion');
			$data_entradad['entradad_updated_at'] = $this->basicrud->formatDateToBD();

			$id_entradad = $this->entradad_model->add_m($data_entradad);
			if($id_entradad){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('entradad_flash_add_message')); 
				redirect('entradad_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('entradad_flash_error_message')); 
				redirect('entradad_controller','location');
			}
		}
		$this->load->view('entradad_view/form_add_entradad',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($entradad_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');

		$data['entradad'] = $this->entradad_model->get_m(array('entradad_id' => $entradad_id),$flag=1);
		
		$this->form_validation->set_rules('entradad_id', 'entradad_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('entradad_modulo', 'entradad_modulo', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('entradad_descripcion', 'entradad_descripcion', 'trim|required|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_entradad  = array();
			$data_entradad['entradad_id'] = $this->input->post('entradad_id');
			$data_entradad['entradad_modulo'] = $this->input->post('entradad_modulo');
			$data_entradad['entradad_descripcion'] = $this->input->post('entradad_descripcion');
			$data_entradad['entradad_updated_at'] = $this->basicrud->formatDateToBD();

			if($this->entradad_model->edit_m($data_entradad)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('entradad_flash_edit_message')); 
				redirect('entradad_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('entradad_flash_error_message')); 
				redirect('entradad_controller','location');
			}
		}else{
			//filtrar todos los modulos de tabgral
			$data["modulos"] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 3));
			$this->load->view('entradad_view/form_edit_entradad',$data);
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
	function editfast_c($entradad_id, $entradad_value)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data_entradad = array();
		
		$data_entradad['entradad_id'] = $entradad_id;
		$data_entradad['entradad_value'] = $entradad_value;
		$data_entradad['entradad_updated_at'] = $this->basicrud->formatDateToBD();

		if($this->entradad_model->edit_m($data_entradad)){ 
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
	 * @param $entradad_id id of record
	 * @return void
	 */
	function delete_c($entradad_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->entradad_model->delete_m($entradad_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('entradad_flash_delete_message')); 
			redirect('entradad_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('entradad_flash_error_delete_message')); 
			redirect('entradad_controller','location');
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

		$data_search_entradad['offset'] = $offset;
		$data_search_entradad['sortBy'] = 'entradad_id';
		$data_search_entradad['sortDirection'] = 'asc';

		$data['entradad'] = $this->entradad_model->get_m($data_search_entradad);

		$data['flag'] = $this->flags;
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->entradad_model->getFieldsTable_m());

		$data['title_header'] = 'Entradas digitales';
		$this->load->view('entradad_view/home_entradad', $data);
		$this->load->view('entradad_view/record_list_entradad');
		$this->load->view('default/_footer');

	}

}