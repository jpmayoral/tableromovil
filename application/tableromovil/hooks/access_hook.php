<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Access_Hook {

	function checkUser()
	{
		$CI =& get_instance();
		$privatecontrollers = array(
			'usuarios_controller',
			'sismenu_controller',
			'perfiles_controller',
			'sispermisos_controller',
			'main_controller',
			'agua_controlleer',
			'entradad_controller',
			'escenarios_controller',
			'iluminacion_controller',
			'localidades_controller',
			'refrigeracion_controller',
			'salidad_controller',
			'seguridad_controller',
			'autocomplete_controller',
			'salidadg_controller',
			'entradadg_controller',
			'controlaccess_controller',
			'cameras_controller',
			'btncameras_controller',
			'audio_controller',
			'playlist_controller',
			'playlistlinea_controller',
			'novedades_controller');
		if($CI->session->userdata('logged_in') == true && $CI->router->method == 'login') redirect('main_controller/index');
		if($CI->session->userdata('logged_in') != true && $CI->router->method != 'login' && in_array($CI->router->class, $privatecontrollers))
		{
			//redirect('usuarios_controller/login_c');
			echo "<script>window.open('".base_url()."welcome/index','_top');</script>";
			//redirect('welcome/index');
		}
	}
}