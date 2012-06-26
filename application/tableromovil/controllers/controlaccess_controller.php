<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Controlaccess_Controller extends CI_Controller
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
				$data['flags'] = $this->basicauth->getPermissions('cameras');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
				$this->load->model('cameras_model');
				$this->load->model('btncameras_model');
		}
	}

	function index()
	{
		//code here
		$data['title_header']='C&aacute;maras';
		$this->load->view('default/_header', $data);
		$data["rows_cameras"] = $this->cameras_model->get_m(); 
		$data["rows_btncameras"] = $this->btncameras_model->get_m(); 
		$this->load->view('controlaccess_view/home_controlaccess',$data);
		$this->load->view('default/_footer');
	}

	function search_c($offset = 0)
	{
		$data["rows_cameras"] = $this->cameras_model->get_m(); 
		$data["rows_btncameras"] = $this->btncameras_model->get_m(); 
		$this->load->view('controlaccess_view/record_list_controlaccess', $data);
	}

}
