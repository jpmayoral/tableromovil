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
				$this->config->load('controlaccess_settings');
				$data['flags'] = $this->basicauth->getPermissions('cameras');
				$this->flagR = $data['flags']['flag-read'];
				$this->flagI = $data['flags']['flag-insert'];
				$this->flagU = $data['flags']['flag-update'];
				$this->flagD = $data['flags']['flag-delete'];
				$this->flags = array('i' => $this->flagI, 'u' => $this->flagU, 'd' => $this->flagD);
				$this->load->model('cameras_model');
				$this->load->model('btncameras_model');

				//actualizar ip publica de las camaras
				$this->establecerIpPublica();
		}
	}

	function index()
	{
		//code here
		if($this->flagR)
		{
			$data['title_header']='C&aacute;maras';
			$this->load->view('default/_header', $data);
			$data["rows_cameras"] = $this->cameras_model->get_m(); 
			$data["rows_btncameras"] = $this->btncameras_model->get_m(); 
			$this->load->view('controlaccess_view/home_controlaccess',$data);
			$this->load->view('default/_footer');
		}else{
			show_404();
            return;
		}
	}

	function search_c($offset = 0)
	{
		if($this->flagR)
		{
			$data["rows_cameras"] = $this->cameras_model->get_m(); 
			$data["rows_btncameras"] = $this->btncameras_model->get_m(); 
			$this->load->view('controlaccess_view/record_list_controlaccess2', $data);
		}else{
			show_404();
            return;
		}
	}


	/**
	 * Esta funcion actualiza la ip publica de todas las camaras del sistema 
	 */
	function establecerIpPublica()
	{
		if($this->flagU)
		{
			$ip_publica = trim($this->getIpPublica());

			if($ip_publica){
				$cameras = $this->cameras_model->get_m(array('cameras_estado' => 9));
				if(count($cameras) > 0){
					foreach ($cameras as $f) {
						$f->cameras_url = str_replace("http://", '', $f->cameras_url );
						if($cameras->cameras_url <> $ip_publica){
							$this->cameras_model->edit_m(array('cameras_id' => $f->cameras_id,'cameras_url' => prep_url($ip_publica)));
						}
					}
				}
			}
		}
	}
	

	/**
	 * Esta funcion optiene la ip publica del servidor de la aplicacion. Hace uso del comando
	 * nslookup a través de la función system de php para obtener la ip publica. Además necesita
	 * un dominio que es establecido en el archivo de configuración controlaccess_settings.php
	 */
	function getIpPublica()
	{
		$data["dominio"] = $this->config->item('dominio');
		$datos_en_crudo = $this->load->view("default/form_ip",$data,TRUE);
		$ip_parcial = explode("Address", $datos_en_crudo);
		return $ip_publica = str_replace(':', '', $ip_parcial[count($ip_parcial)-1]);

	}

}
