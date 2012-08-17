<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novedades_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('novedades_model');
			$this->config->load('novedades_settings');
			$data['flags'] = $this->basicauth->getPermissions('novedades');
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
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['title_header'] = 'Novedades';
			$this->load->view('novedades_view/home_novedades', $data);
			$this->load->view('default/_footer');
		}

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
	
		$this->form_validation->set_rules('novedades_descripcion', 'novedades_descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('novedades_estado', 'novedades_estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('novedades_tipo', 'novedades_tipo', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('novedades_leido', 'novedades_leido', 'trim|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_novedades  = array();
			$data_novedades['novedades_descripcion'] = $this->input->post('novedades_descripcion');
			$data_novedades['novedades_estado'] = $this->input->post('novedades_estado');
			$data_novedades['novedades_tipo'] = $this->input->post('novedades_tipo');
			$data_novedades['novedades_leido'] = $this->input->post('novedades_leido');

			$id_novedades = $this->novedades_model->add_m($data_novedades);
			if($id_novedades){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('novedades_flash_add_message')); 
				redirect('novedades_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('novedades_flash_error_message')); 
				redirect('novedades_controller','location');
			}
		}
		$this->load->view('novedades_view/form_add_novedades',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($novedades_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['novedades'] = $this->novedades_model->get_m(array('novedades_id' => $novedades_id),$flag=1);
		$this->form_validation->set_rules('novedades_id', 'novedades_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('novedades_fecha', 'novedades_fecha', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('novedades_descripcion', 'novedades_descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('novedades_estado', 'novedades_estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('novedades_tipo', 'novedades_tipo', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('novedades_leido', 'novedades_leido', 'trim|integer|xss_clean');
		if($this->form_validation->run()){
			$data_novedades  = array();
			$data_novedades['novedades_id'] = $this->input->post('novedades_id');
			$data_novedades['novedades_fecha'] = $this->basicrud->getFormatDateToBD($this->input->post('novedades_fecha'));
			$data_novedades['novedades_descripcion'] = $this->input->post('novedades_descripcion');
			$data_novedades['novedades_estado'] = $this->input->post('novedades_estado');
			$data_novedades['novedades_tipo'] = $this->input->post('novedades_tipo');
			$data_novedades['novedades_leido'] = $this->input->post('novedades_leido');

			if($this->novedades_model->edit_m($data_novedades)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('novedades_flash_edit_message')); 
				redirect('novedades_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('novedades_flash_error_message')); 
				redirect('novedades_controller','location');
			}
		}
		$this->load->view('novedades_view/form_edit_novedades',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $novedades_id id of record
	 * @return void
	 */
	function delete_c($novedades_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->novedades_model->delete_m($novedades_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('novedades_flash_delete_message')); 
			redirect('novedades_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('novedades_flash_error_delete_message')); 
			redirect('novedades_controller','location');
		}

	}



	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search_c($offset = 0,$sortBy='', $sortDirection='')
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_novedades = array(); 

		$data_search_novedades['offset'] = $offset;
		$data_search_novedades['sortBy'] = $this->sort_column($sortBy);
		$data_search_novedades['sortDirection'] = $this->sort_direction($sortDirection);

		$data['novedades'] = $this->novedades_model->get_m($data_search_novedades);
		$data['sortBy'] = $data_search_novedades['sortBy'];
		$data['sortDirection'] = $data_search_novedades['sortDirection'];
		$data['flag'] = $this->flags;
		
		$this->load->view('novedades_view/record_list_novedades',$data);
	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	/*function find_c()
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_novedades = array(); 

		$data_search_novedades['limit'] = 4;
		$data_search_novedades['sortBy'] = 'novedades_fecha';
		$data_search_novedades['sortDirection'] = 'desc';

		$data['novedades'] = $this->novedades_model->get_m($data_search_novedades);

		$data['flag'] = $this->flags;
		$this->load->view('novedades_view/record_list_novedades_to_footermain',$data);
	}*/


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function getNovJson()
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_novedades = array(); 

		$data_search_novedades['limit'] = 4;
		$data_search_novedades['sortBy'] = 'novedades_fecha';
		$data_search_novedades['sortDirection'] = 'desc';
		$data_search_novedades['novedades_leido'] = 0; //no leido
		$data_search_novedades['novedades_estado'] = 1; //estado activada

		$data['novedades'] = $this->novedades_model->get_m($data_search_novedades);

		
		echo json_encode($data['novedades']);
	}


	function changeStateLeido($novedades_ids)
	{
		$statusArr = array();
		$novids = explode(",", urldecode($novedades_ids));
		unset($novids[count($novids)-1]);

		foreach ($novids as $f) {
			if(!$this->novedades_model->edit_m(array('novedades_id' => $f, 'novedades_leido' => 1))){
				$statusArr[] = false;
			}
		}

		if(count($statusArr) > 0)
			echo json_encode('error');
		else 
			echo json_encode('ok');
	}


	private function sort_column($column=''){
		(empty($column)) ? $sortBy = 'novedades_fecha' : $sortBy = $column;
		return $sortBy; 
	}
	
	private function sort_direction($direction=''){
		(empty($direction)) ? $sortDirection = 'desc' : $sortDirection = $direction;
		return $sortDirection; 
	}
}