<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Playlist_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('playlist_model');
			$this->load->model('playlistlinea_model');
			$this->config->load('playlist_settings');
			$data['flags'] = $this->basicauth->getPermissions('playlist');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->playlist_model->getFieldsTable_m());
			$this->load->view('playlist_view/home_playlist', $data);
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
			show_404();
            return;
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('playlist_descripcion', 'playlist_descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('usuarios_id', 'usuarios_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlist_created_at', 'playlist_created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlist_updated_at', 'playlist_updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_playlist  = array();
			$data_playlist['playlist_descripcion'] = $this->input->post('playlist_descripcion');
			$data_playlist['usuarios_id'] = $this->input->post('usuarios_id');
			$data_playlist['playlist_created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlist_created_at'));
			$data_playlist['playlist_updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlist_updated_at'));

			$id_playlist = $this->playlist_model->add_m($data_playlist);
			if($id_playlist){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('playlist_flash_add_message')); 
				redirect('playlist_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('playlist_flash_error_message')); 
				redirect('playlist_controller','location');
			}
		}
		$this->load->view('playlist_view/form_add_playlist',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($playlist_id)
	{
		//code here
		if(!$this->flagU){
			show_404();
            return;
		}

		$data = array();
		$data['playlist'] = $this->playlist_model->get_m(array('playlist_id' => $playlist_id),$flag=1);
		if (is_null($data['playlist']))
        {
            show_404();
            return;
        }

		$data['subtitle'] = $this->config->item('recordEditTitle');
		
		$this->form_validation->set_rules('playlist_id', 'playlist_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlist_descripcion', 'playlist_descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('usuarios_id', 'usuarios_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('playlist_created_at', 'playlist_created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('playlist_updated_at', 'playlist_updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_playlist  = array();
			$data_playlist['playlist_id'] = $this->input->post('playlist_id');
			$data_playlist['playlist_descripcion'] = $this->input->post('playlist_descripcion');
			$data_playlist['usuarios_id'] = $this->input->post('usuarios_id');
			$data_playlist['playlist_created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlist_created_at'));
			$data_playlist['playlist_updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('playlist_updated_at'));

			if($this->playlist_model->edit_m($data_playlist)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('playlist_flash_edit_message')); 
				redirect('playlist_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('playlist_flash_error_message')); 
				redirect('playlist_controller','location');
			}
		}
		$this->load->view('playlist_view/form_edit_playlist',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $playlist_id id of record
	 * @return void
	 */
	function delete_c($playlist_id)
	{
		//code here
		if(!$this->flagD){
			show_404();
            return;
		}

		$data['playlist'] = $this->playlist_model->get_m(array('playlist_id' => $playlist_id),$flag=1);
		if (is_null($data['playlist']))
        {
            show_404();
            return;
        }

		if($this->playlist_model->delete_m($playlist_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('playlist_flash_delete_message')); 
			redirect('playlist_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('playlist_flash_error_delete_message')); 
			redirect('playlist_controller','location');
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
		$data_search_playlist = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->playlist_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_playlist[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_playlist['limit'] = $this->config->item('pag_perpage');
			$data_search_playlist['offset'] = $offset;
			$data_search_playlist['sortBy'] = 'playlist_id';
			$data_search_playlist['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'playlist_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['playlist'] = $this->playlist_model->get_m($data_search_playlist);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'playlist_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['playlist'] = $this->playlist_model->get_m($data_search_playlist);
			}
			$data['flag'] = $this->flags;
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->playlist_model->getFieldsTable_m());
			$this->load->view('playlist_view/record_list_playlist',$data);
		}else{
			show_404();
            return;
		}

	}



	function new_c($album, $listsongs, $playlist_descripcion)
	{

		if(!$this->flagI){
			show_404();
            return;
		}

		$songs = explode(",", urldecode($listsongs));
		unset($songs[count($songs)-1]);
		

		$data_playlist['playlist_descripcion'] = urldecode($playlist_descripcion);
		$data_playlist['usuarios_id'] = $this->session->userdata('usuarios_id');
		$data_playlist['playlist_updated_at'] = $this->basicrud->formatDateToBD();


		$id_playlist = $this->playlist_model->add_m($data_playlist);
		if($id_playlist){
			foreach ($songs as $f) {
				$data_playlistlinea['playlistlinea_path'] = urldecode($album);
				$data_playlistlinea['playlistlinea_namesong'] = $f;
				$data_playlistlinea['playlist_id'] = $id_playlist;
				$data_playlistlinea['playlistlinea_updated_at'] = $this->basicrud->formatDateToBD();

				$id_playlistlinea = $this->playlistlinea_model->add_m($data_playlistlinea);
			}
			$data['state'] = 'Se ha creado correctamente la lista de reproducción';
		}else{
			$data['state'] = 'Hubo un problema al crear la lista de reproducción';
		}

		$data['album'] = urldecode($album);
		$data['playlist_descripcion'] = urldecode($playlist_descripcion);
		$data['songs'] = $songs;
		$this->load->view("audio_view/result_add_playlist",$data);


	}



	function modify_m($playlist_id, $album, $listsongs)
	{
		if(!$this->flagU){
			show_404();
            return;
		}

		$playlist = $this->playlist_model->get_m(array('playlist_id' => $playlist_id));
		if($playlist_id){
			$songs = explode(",", urldecode($listsongs));
			unset($songs[count($songs)-1]);

			foreach ($songs as $f) {
				$data_playlistlinea['playlistlinea_path'] = urldecode($album);
				$data_playlistlinea['playlistlinea_namesong'] = $f;
				$data_playlistlinea['playlist_id'] = $playlist_id;
				$data_playlistlinea['playlistlinea_updated_at'] = $this->basicrud->formatDateToBD();

				$id_playlistlinea = $this->playlistlinea_model->add_m($data_playlistlinea);
			}
			$data['state'] = "Las canciones seleccionadas se han añadido correctamente a la lista de reproducci&oacute;n.";
		}else{
			$data['state'] = "Hubo un error al añadir las canciones seleccionadas a la lista de reproducci&oacute;n";
		}

		$data['album'] = urldecode($album);
		$data['playlist_descripcion'] = $playlist[0]->playlist_descripcion;
		$data['songs'] = $songs;
		$this->load->view("audio_view/result_add_playlist",$data);
	}


	function showPlayList($album,  $tracksSelelected)
	{
		if(!$this->flagR){
			show_404();
            return;
		}

		$tracks = explode(",", urldecode($tracksSelelected));
		unset($tracks[count($tracks)-1]);
		$data['tracks'] = $tracks;
		$data['playlist'] = $this->getAllPlayList();
		$data['album'] = urldecode($album);
		if(count($tracks)<=0){
			$data['state'] = "Debes seleccionar al menos una canci&oacute;n para añadirla a una lista de reproducci&oacute;n."; 
		}
		$this->load->view("audio_view/_listas_de_reproduccion",$data);
	}

	function getAllPlayList()
	{
		return $this->playlist_model->get_m(array('usuarios_id' => $this->session->userdata('usuarios_id')));
	}


	function showFormNewPlayList($album, $tracksSelelected)
	{
		if(!$this->flagI){
			show_404();
            return;
		}
		
		$tracks = explode(",", urldecode($tracksSelelected));
		unset($tracks[count($tracks)-1]);
		$data['tracks'] = $tracks;
		$data['album'] = urldecode($album);
		$this->load->view("audio_view/_nueva_lista_de_reproduccion",$data);
	}
}