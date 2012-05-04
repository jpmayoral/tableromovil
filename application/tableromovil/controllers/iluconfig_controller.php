<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iluconfig_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		$this->load->model('iluconfig_model');
		$this->config->load('iluconfig_settings');
		if($this->session->userdata('logged_in') == true) { 
			$data['flags'] = $this->basicauth->getPermissions('iluminacion');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r'=> $this->flagR, 'i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
			$this->load->model('salidad_model');
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
		$this->form_validation->set_rules('iluconfig_descripcion', 'iluconfig_descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('salidad_id', 'salidad_id', 'trim|required|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_iluconfig  = array();
			$data_iluconfig['iluconfig_descripcion'] = $this->input->post('iluconfig_descripcion');
			$data_iluconfig['salidad_id'] = $this->input->post('salidad_id');
			$data_iluconfig['iluconfig_updated_at'] = $this->basicrud->formatDateToBD();

			$id_iluconfig = $this->iluconfig_model->add_m($data_iluconfig);
			if($id_iluconfig){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('iluconfig_flash_add_message')); 
				redirect('iluconfig_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('iluconfig_flash_error_message')); 
				redirect('iluconfig_controller','location');
			}
		}else{
			$data["salidas_d"] = $this->salidad_model->get_m();
			$this->load->view('iluconfig_view/form_add_iluconfig',$data);
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
	function edit_c($iluconfig_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['iluconfig'] = $this->iluconfig_model->get_m(array('iluconfig_id' => $iluconfig_id),$flag=1);
		$this->form_validation->set_rules('iluconfig_id', 'iluconfig_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('iluconfig_descripcion', 'iluconfig_descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('salidad_id', 'salidad_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('iluconfig_created_at', 'iluconfig_created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('iluconfig_updated_at', 'iluconfig_updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_iluconfig  = array();
			if($this->input->post('iluconfig_id'))
				$data_iluconfig['iluconfig_id'] = $this->input->post('iluconfig_id');
			if($this->input->post('iluconfig_descripcion'))
				$data_iluconfig['iluconfig_descripcion'] = $this->input->post('iluconfig_descripcion');
			if($this->input->post('salidad_id'))
				$data_iluconfig['salidad_id'] = $this->input->post('salidad_id');
			if($this->input->post('iluconfig_created_at'))
				$data_iluconfig['iluconfig_created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('iluconfig_created_at'));
			if($this->input->post('iluconfig_updated_at'))
				$data_iluconfig['iluconfig_updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('iluconfig_updated_at'));

			if($this->iluconfig_model->edit_m($data_iluconfig)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('iluconfig_flash_edit_message')); 
				redirect('iluconfig_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('iluconfig_flash_error_message')); 
				redirect('iluconfig_controller','location');
			}
		}
		$this->load->view('iluconfig_view/form_edit_iluconfig',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $iluconfig_id id of record
	 * @return void
	 */
	function delete_c($iluconfig_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->iluconfig_model->delete_m($iluconfig_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('iluconfig_flash_delete_message')); 
			redirect('iluconfig_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('iluconfig_flash_error_delete_message')); 
			redirect('iluconfig_controller','location');
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
		$data_search_iluconfig = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->iluconfig_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_iluconfig[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_iluconfig['limit'] = $this->config->item('pag_perpage');
			$data_search_iluconfig['offset'] = $offset;
			$data_search_iluconfig['sortBy'] = 'iluconfig_id';
			$data_search_iluconfig['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'iluconfig_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['iluconfig'] = $this->iluconfig_model->get_m($data_search_iluconfig);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'iluconfig_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['iluconfig'] = $this->iluconfig_model->get_m($data_search_iluconfig);
			}
			
			$data['flag'] = $this->flags;
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->iluconfig_model->getFieldsTable_m());
			

			$data['title_header'] = 'Iluminacion Config';
			$this->load->view('iluconfig_view/home_iluconfig', $data);
			$this->load->view('iluconfig_view/record_list_iluconfig');
			$this->load->view('default/_footer');
		}

	}

}