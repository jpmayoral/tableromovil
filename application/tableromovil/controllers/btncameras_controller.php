<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Btncameras_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('btncameras_model');
			$this->load->model('salidad_model');
			$this->load->model('tabgral_model');
			$this->config->load('btncameras_settings');
			$data['flags'] = $this->basicauth->getPermissions('btncameras');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r'=>$this->flagR,'i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index($cameras_id)
	{
		//code here
		$this->search_c(0,$cameras_id);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for saving 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function add_c($cameras_id)
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('btncameras_nombre', 'btncameras_nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('btncameras_label', 'btncameras_label', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('btncameras_url', 'btncameras_url', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('salidad_id', 'salidad_id', 'trim|required|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_btncameras  = array();
			$data_btncameras['btncameras_nombre'] = $this->input->post('btncameras_nombre');
			$data_btncameras['btncameras_label'] = $this->input->post('btncameras_label');
			if($this->input->post('btncameras_url'))
				$data_btncameras['btncameras_url'] = $this->input->post('btncameras_url');
			$data_btncameras['salidad_id'] = $this->input->post('salidad_id');
			$data_btncameras['cameras_id'] = $this->input->post('cameras_id');
			$data_btncameras['btncameras_updated_at'] = $this->basicrud->formatDateToBD();

			$id_btncameras = $this->btncameras_model->add_m($data_btncameras);
			if($id_btncameras){ 
				$data_salidad['salidad_id'] =  $data_btncameras['salidad_id'];
				$data_salidad['salidad_modulo'] = 12; //modulo Botones
				$data_salidad['salidad_descripcion'] = $data_btncameras['btncameras_nombre'];
				$data_salidad['salidad_estado'] = 2; //estado asignada
				$data_salidad['salidad_updated_at'] =  $this->basicrud->formatDateToBD();
				
				if($this->salidad_model->edit_m($data_salidad)){
					$this->session->set_flashdata('flashConfirm', $this->config->item('btncameras_flash_add_message')); 
					redirect('btncameras_controller/index/'.$cameras_id,'location');
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('btncameras_flash_error_message')); 
				redirect('btncameras_controller/index/'.$cameras_id,'location');
			}
		}else{
			$data['cameras_id'] = $cameras_id;
			$data['salidad'] = $this->salidad_model->get_m(array('salidad_estado' => 1)); //salidas digitales con estado libre
			$data['modulo'] = $this->tabgral_model->get_m(array('tabgral_id' => 12),1); //modulo de botones
			
			$this->load->view('btncameras_view/form_add_btncameras',$data);	
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
	function edit_c($btncameras_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['btncameras'] = $this->btncameras_model->get_m(array('btncameras_id' => $btncameras_id),$flag=1);
		
		$this->form_validation->set_rules('btncameras_id', 'btncameras_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('btncameras_nombre', 'btncameras_nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('btncameras_label', 'btncameras_label', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('btncameras_url', 'btncameras_url', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('salidad_id', 'salidad_id', 'trim|required|integer|xss_clean');
	
		if($this->form_validation->run()){
			$data_btncameras  = array();
			$data_btncameras['btncameras_id'] = $this->input->post('btncameras_id');
			$data_btncameras['btncameras_nombre'] = $this->input->post('btncameras_nombre');
			$data_btncameras['btncameras_label'] = $this->input->post('btncameras_label');
			$data_btncameras['btncameras_url'] = $this->input->post('btncameras_url');
			$data_btncameras['salidad_id'] = $this->input->post('salidad_id');
			$data_btncameras['cameras_id'] = $this->input->post('cameras_id');
			$data_btncameras['btncameras_updated_at'] = $this->basicrud->formatDateToBD();

			if($this->btncameras_model->edit_m($data_btncameras)){ 
				$data_salidad['salidad_id'] =  $data_btncameras['salidad_id'];
				$data_salidad['salidad_modulo'] = 12; //modulo Botones
				$data_salidad['salidad_descripcion'] = $data_btncameras['btncameras_nombre'];
				$data_salidad['salidad_estado'] = 2; //estado asignada
				$data_salidad['salidad_updated_at'] =  $this->basicrud->formatDateToBD();
				
				if($this->salidad_model->edit_m($data_salidad)){
					$this->session->set_flashdata('flashConfirm', $this->config->item('btncameras_flash_edit_message')); 
					redirect('btncameras_controller/index/'.$data_btncameras['cameras_id'],'location');
				}
				
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('btncameras_flash_error_message')); 
				redirect('btncameras_controller/index/'.$data_btncameras['cameras_id'],'location');
			}
		}else{
			$this->load->view('btncameras_view/form_edit_btncameras',$data);
		}
		

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $btncameras_id id of record
	 * @return void
	 */
	function delete_c($btncameras_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->btncameras_model->delete_m($btncameras_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('btncameras_flash_delete_message')); 
			redirect('btncameras_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('btncameras_flash_error_delete_message')); 
			redirect('btncameras_controller','location');
		}

	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search_c($offset = 0, $cameras_id)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_salidad = array(); 

		$data_search_btncameras['cameras_id'] = $cameras_id;
		$data_search_btncameras['offset'] = $offset;
		$data_search_btncameras['sortBy'] = 'btncameras_id';
		$data_search_btncameras['sortDirection'] = 'asc';

		$data['btncameras'] = $this->btncameras_model->get_m($data_search_btncameras);

		$data['flag'] = $this->flags;
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->btncameras_model->getFieldsTable_m());

		$data['title_header'] = 'Config. Botones';
		$data['cameras_id'] = $cameras_id;

		$this->load->view('btncameras_view/home_btncameras', $data);
		$this->load->view('btncameras_view/record_list_btncameras');
		$this->load->view('default/_footer');

	}

}