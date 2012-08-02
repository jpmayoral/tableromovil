<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playlistlinea_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('playlistlinea_model');
			$this->config->load('playlistlinea_settings');
			$data['flags'] = $this->basicauth->getPermissions('playlistlinea');
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
			$data['subtitle'] = $this->config->item('recordListTitle');
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->playlistlinea_model->getFieldsTable_m());
			$this->load->view('playlistlinea_view/home_playlistlinea', $data);
			$this->search_c();
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
		$this->form_validation->set_rules('playlistlinea_id', 'playlistlinea_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlistlinea_path', 'playlistlinea_path', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlistlinea_namesong', 'playlistlinea_namesong', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlist_id', 'playlist_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlistlinea_created_at', 'playlistlinea_created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlistlinea_updated_at', 'playlistlinea_updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_playlistlinea  = array();
			$data_playlistlinea['playlistlinea_path'] = $this->input->post('playlistlinea_path');
			$data_playlistlinea['playlistlinea_namesong'] = $this->input->post('playlistlinea_namesong');
			$data_playlistlinea['playlist_id'] = $this->input->post('playlist_id');
			$data_playlistlinea['playlistlinea_created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlistlinea_created_at'));
			$data_playlistlinea['playlistlinea_updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlistlinea_updated_at'));

			$id_playlistlinea = $this->playlistlinea_model->add_m($data_playlistlinea);
			if($id_playlistlinea){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('playlistlinea_flash_add_message')); 
				redirect('playlistlinea_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('playlistlinea_flash_error_message')); 
				redirect('playlistlinea_controller','location');
			}
		}
		$this->load->view('playlistlinea_view/form_add_playlistlinea',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($playlistlinea_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['playlistlinea'] = $this->playlistlinea_model->get_m(array('playlistlinea_id' => $playlistlinea_id),$flag=1);
		$this->form_validation->set_rules('playlistlinea_id', 'playlistlinea_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlistlinea_path', 'playlistlinea_path', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlistlinea_namesong', 'playlistlinea_namesong', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlist_id', 'playlist_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlistlinea_created_at', 'playlistlinea_created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlistlinea_updated_at', 'playlistlinea_updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_playlistlinea  = array();
			$data_playlistlinea['playlistlinea_id'] = $this->input->post('playlistlinea_id');
			$data_playlistlinea['playlistlinea_path'] = $this->input->post('playlistlinea_path');
			$data_playlistlinea['playlistlinea_namesong'] = $this->input->post('playlistlinea_namesong');
			$data_playlistlinea['playlist_id'] = $this->input->post('playlist_id');
			$data_playlistlinea['playlistlinea_created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlistlinea_created_at'));
			$data_playlistlinea['playlistlinea_updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlistlinea_updated_at'));

			if($this->playlistlinea_model->edit_m($data_playlistlinea)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('playlistlinea_flash_edit_message')); 
				redirect('playlistlinea_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('playlistlinea_flash_error_message')); 
				redirect('playlistlinea_controller','location');
			}
		}
		$this->load->view('playlistlinea_view/form_edit_playlistlinea',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $playlistlinea_id id of record
	 * @return void
	 */
	function delete_c($playlistlinea_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->playlistlinea_model->delete_m($playlistlinea_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('playlistlinea_flash_delete_message')); 
			redirect('playlistlinea_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('playlistlinea_flash_error_delete_message')); 
			redirect('playlistlinea_controller','location');
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
		$data_search_playlistlinea = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->playlistlinea_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_playlistlinea[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_playlistlinea['limit'] = $this->config->item('pag_perpage');
			$data_search_playlistlinea['offset'] = $offset;
			$data_search_playlistlinea['sortBy'] = 'playlistlinea_id';
			$data_search_playlistlinea['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'playlistlinea_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['playlistlinea'] = $this->playlistlinea_model->get_m($data_search_playlistlinea);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'playlistlinea_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['playlistlinea'] = $this->playlistlinea_model->get_m($data_search_playlistlinea);
			}
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->playlistlinea_model->getFieldsTable_m());
			$this->load->view('playlistlinea_view/record_list_playlistlinea',$data);
		}

	}

}