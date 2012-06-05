<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cameras_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 		
			$this->load->model('cameras_model');
			$this->load->model('tabgral_model');
			$this->config->load('cameras_settings');
			$data['flags'] = $this->basicauth->getPermissions('cameras');
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
		$data['title_header'] = $this->config->item('recordEditTitle');

		$this->form_validation->set_rules('cameras_descripcion', 'cameras_descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cameras_url', 'cameras_url', 'trim|required|max_length[256]|xss_clean|prep_url|valid_url_format');
		$this->form_validation->set_rules('cameras_port', 'cameras_port', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cameras_estado', 'cameras_estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cameras_user', 'cameras_user', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cameras_password', 'cameras_password', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_cameras  = array();
			$data_cameras['cameras_descripcion'] = $this->input->post('cameras_descripcion');
			$data_cameras['cameras_url'] = $this->input->post('cameras_url');
			$data_cameras['cameras_port'] = $this->input->post('cameras_port');
			$data_cameras['cameras_estado'] = $this->input->post('cameras_estado');
			$data_cameras['cameras_user'] = $this->input->post('cameras_user');
			$data_cameras['cameras_password'] = $this->input->post('cameras_password');
			$data_cameras['cameras_updated_at'] = $this->basicrud->formatDateToBD();

			$id_cameras = $this->cameras_model->add_m($data_cameras);
			if($id_cameras){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('cameras_flash_add_message')); 
				redirect('cameras_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('cameras_flash_error_message')); 
				redirect('cameras_controller','location');
			}
		}else{
			//filtrar todos los estados que pueden tener las camaras 
			$data["estados"] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 4));
			$this->load->view('cameras_view/form_add_cameras',$data);
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
	function edit_c($cameras_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['cameras'] = $this->cameras_model->get_m(array('cameras_id' => $cameras_id),$flag=1);
		
		$this->form_validation->set_rules('cameras_id', 'cameras_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cameras_descripcion', 'cameras_descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cameras_url', 'cameras_url', 'trim|required|max_length[256]|xss_clean|prep_url|valid_url_format');
		$this->form_validation->set_rules('cameras_port', 'cameras_port', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cameras_estado', 'cameras_estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cameras_user', 'cameras_user', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cameras_password', 'cameras_password', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_cameras  = array();
			$data_cameras['cameras_id'] = $this->input->post('cameras_id');
			$data_cameras['cameras_descripcion'] = $this->input->post('cameras_descripcion');
			$data_cameras['cameras_url'] = $this->input->post('cameras_url');
			$data_cameras['cameras_port'] = $this->input->post('cameras_port');
			$data_cameras['cameras_estado'] = $this->input->post('cameras_estado');
			$data_cameras['cameras_user'] = $this->input->post('cameras_user');
			$data_cameras['cameras_password'] = $this->input->post('cameras_password');
			$data_cameras['cameras_updated_at'] = $this->basicrud->formatDateToBD();

			if($this->cameras_model->edit_m($data_cameras)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('cameras_flash_edit_message')); 
				redirect('cameras_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('cameras_flash_error_message')); 
				redirect('cameras_controller','location');
			}
		}else{
			//filtrar todos los estados que pueden tener las camaras 
			$data["estados"] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 4));
			$this->load->view('cameras_view/form_edit_cameras',$data);
		}
	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $cameras_id id of record
	 * @return void
	 */
	function delete_c($cameras_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->cameras_model->delete_m($cameras_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('cameras_flash_delete_message')); 
			redirect('cameras_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('cameras_flash_error_delete_message')); 
			redirect('cameras_controller','location');
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

		$data_search_cameras['offset'] = $offset;
		$data_search_cameras['sortBy'] = 'cameras_id';
		$data_search_cameras['sortDirection'] = 'asc';

		$data['cameras'] = $this->cameras_model->get_m($data_search_cameras);

		$data['flag'] = $this->flags;
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->cameras_model->getFieldsTable_m());

		$data['title_header'] = 'Config. Cámaras';
		$this->load->view('cameras_view/home_cameras', $data);
		$this->load->view('cameras_view/record_list_cameras');
		$this->load->view('default/_footer');

	}

}