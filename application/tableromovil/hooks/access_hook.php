<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_Hook {

	function checkUser()
	{
		$CI =& get_instance();
		$privatecontrollers = array('usuarios_controller','sismenu_controller','perfiles_controller','sispermisos_controller','main_controller');
		if($CI->session->userdata('logged_in') == true && $CI->router->method == 'login') redirect('main_controller');
		if($CI->session->userdata('logged_in') != true && $CI->router->method != 'login' && in_array($CI->router->class, $privatecontrollers))
		{
			//redirect('usuarios_controller/login_c');
			echo "<script>window.open('".base_url()."welcome/index','_top');</script>";
		}
	}

}