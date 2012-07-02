<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Escenarios_Controller extends CI_Controller
{
	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;
	
	private $flag_override_img = FALSE;
	private $name_thumb = '';

	function __construct()
	{
		parent::__construct();	
		if($this->session->userdata('logged_in') == TRUE) {
				$data['flags'] = $this->basicauth->getPermissions('escenarios');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
				$this->load->model('escenarios_model');
				$this->config->load('escenarios_settings');	
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
		$data['title_header'] = $this->config->item('recordAddTitle');
	
		$this->form_validation->set_rules('escenarios_descripcion', 'escenarios_descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('escenarios_estado', 'escenarios_estado', 'trim|required|integer|xss_clean');
	
		if($this->form_validation->run())
		{	
			$data_escenarios  = array();
			$data_escenarios['escenarios_descripcion'] = $this->input->post('escenarios_descripcion');
			$data_escenarios['escenarios_estado'] = $this->input->post('escenarios_estado');
			$data_escenarios['escenarios_updated_at'] = $this->basicrud->formatDateToBD();
			$data_escenarios['escenarios_iconpath'] = $this->upload();

			$id_escenarios = $this->escenarios_model->add_m($data_escenarios);
			if($id_escenarios){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('escenarios_flash_add_message')); 
				redirect('escenarios_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('escenarios_flash_error_message')); 
				redirect('escenarios_controller','location');
			}
			
		}else{
			$this->load->view('escenarios_view/form_add_escenarios',$data);
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
	function edit_c($escenarios_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');

		$data['escenario'] = $this->escenarios_model->get_m(array('escenarios_id' => $escenarios_id),$flag=1);

		$this->form_validation->set_rules('escenarios_id', 'escenarios_id', 'trim|integer|required|xss_clean');
		$this->form_validation->set_rules('escenarios_descripcion', 'escenarios_descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('escenarios_estado', 'escenarios_estado', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_escenarios  = array();
			$data_escenarios['escenarios_id'] = $this->input->post('escenarios_id');
			$data_escenarios['escenarios_descripcion'] = $this->input->post('escenarios_descripcion');
			$data_escenarios['escenarios_estado'] = $this->input->post('escenarios_estado');
			$data_escenarios['escenarios_updated_at'] = $this->basicrud->formatDateToBD();
			$data_escenarios['escenarios_iconpath'] = $this->editimg($this->input->post('escenarios_id'));

			if($this->escenarios_model->edit_m($data_escenarios)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('escenarios_flash_edit_message')); 
				redirect('escenarios_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('escenarios_flash_error_message')); 
				redirect('escenarios_controller','location');
			}
		}else{
	
			$this->load->view('escenarios_view/form_edit_escenarios',$data);
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
	function delete_c($escenarios_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}
		
		$escenario = $this->escenarios_model->get_m(array('escenarios_id' => $escenarios_id));

		if($escenario){
			if($this->escenarios_model->delete_m($escenarios_id)){
				unlink("./thumbs/escenarios/".$escenario[0]->escenarios_iconpath); 
				$this->session->set_flashdata('flashConfirm', $this->config->item('escenarios_flash_delete_message')); 
				redirect('escenarios_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('escenarios_flash_error_delete_message')); 
				redirect('escenarios_controller','location');
			}
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('escenarios_flash_error_delete_message')); 
			redirect('escenarios_controller','location');
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
		$this->load->view('escenarios_view/home_escenarios', $data);
		$this->load->view('escenarios_view/record_list_escenarios');
		$this->load->view('default/_footer');
		

	}



	function upload()
	{
		$this->load->helper('string');
		
		$config['upload_path'] = './thumbs/escenarios/';
		$config['allowed_types'] = 'jpg|png';

		if($this->flag_override_img == FALSE){
			$config['file_name'] = 'thumb_'.random_string('alnum', 25);
		}else{
			if($this->name_thumb == ''){
				$config['file_name'] = 'thumb_'.random_string('alnum', 25);
			}else{
				$config['file_name'] = $this->name_thumb;
				$config['overwrite'] = $this->flag_override_img;
			}
		}

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('escenarios_iconpath'))
		{
			$error = array('error' => $this->upload->display_errors());
			return null;
		}
		else
		{
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}



	function editimg($escenarios_id)
	{
		$escenario = $this->escenarios_model->get_m(array('escenarios_id' => $escenarios_id));

		if($escenario[0]->escenarios_iconpath) $this->name_thumb = $escenario[0]->escenarios_iconpath;
		$this->flag_override_img = TRUE;

		return $name_image = $this->upload();
	}
}