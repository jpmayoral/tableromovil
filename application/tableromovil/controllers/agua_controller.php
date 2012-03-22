<?php
if (! defined ('BASEPATH')) exit('No direct script acess allowed');

/**
* 
*/
class Agua_controller extends CI_Controller
{

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('perfiles_model');
		$this->load->model('sisperfil_model');
		$this->load->model('tabgral_model');
		$this->config->load('perfiles_setting');
	}
}