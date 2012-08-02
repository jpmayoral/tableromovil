<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Audio_Controller extends CI_Controller
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
				$this->load->model('playlist_model');
				$this->load->model('playlistlinea_model');
				$this->load->helper('directory');
		}
	}

	function index()
	{
		//code here
		$data['title_header']='Audio';
		$this->load->view('default/_header', $data);
		$data['albunes'] = $this->getAlbunes();
		$data['playlist'] = $this->getAllPlayList();
		$this->load->view('audio_view/home_audio',$data);
		$this->load->view('default/_footer');
	}

	function getAlbunes()
	{
		
		return $albunes = directory_map('./sounds/');
	}

	function showSongs($album)
	{
		$data['title_header'] = urldecode($album);
		$data['album'] = urldecode($album);
		$data['songs'] = $this->parseSongs($album);
		$this->load->view('default/_header', $data);
		$this->load->view('audio_view/show_songs',$data);
		$this->load->view('audio_view/_footer_audio');
	}


	function parseSongs($album)
	{
		$newSongs = array();
		$songs = directory_map("./sounds/".urldecode($album)."/");
		foreach ($songs as $key => $value) {
			$parse1 = substr($value, -3); 
			if($parse1 == 'mp3'){
				$parse2 = str_replace(".mp3", '', $value);
				$newSongs[] = $parse2;
			}
		}
		return $newSongs;
	}

	
	function playMusic($album,$param_tracks)
	{
		$data['title_header'] = urldecode($album);
		$this->load->view('audio_view/_header_audio', $data);
		
		$tracks = explode(",", urldecode($param_tracks));
		unset($tracks[count($tracks)-1]);
		$data['tracks'] = $tracks;
		$data['album'] = urldecode($album);
		
		$this->load->view('audio_view/play',$data);
		$this->load->view('audio_view/_footer_audio_tracks',$data);
		
	}


	function getAllPlayList()
	{
		return $this->playlist_model->get_m(array('usuarios_id' => $this->session->userdata('usuarios_id')));
	}



	function showSongsPlayList($playlist_id)
	{
		$playlist = $this->playlist_model->get_m(array('playlist_id' => $playlist_id));
		if($playlist){
			$data['title_header'] = $playlist[0]->playlist_descripcion;
			$data['playlist_id'] =  $playlist_id;
			$data['songs'] = $this->playlistlinea_model->get_m(array('playlist_id' => $playlist_id));
			$this->load->view('default/_header', $data);
			$this->load->view('audio_view/show_song_playlist',$data);
			$this->load->view('audio_view/_footer_audio_playlist');
		}
	}


	function playMusicPlayList($playlist_id, $nameplaylist,$param_playlist,$param_tracks)
	{
		$data['title_header'] = urldecode($nameplaylist);
		$this->load->view('audio_view/_header_audio', $data);
		
		$playlist = explode(",", urldecode($param_playlist));
		unset($playlist[count($playlist)-1]);

		$tracks = explode(",", urldecode($param_tracks));
		unset($tracks[count($tracks)-1]);

		$data['titulos'] = $tracks;
		$data['playlist_id'] = $playlist_id;

		for($i=0; $i<count($playlist); $i++){
			$tracks[$i] = $playlist[$i].'/'.$tracks[$i];
		}

		$data['tracks'] = $tracks;
		$this->load->view('audio_view/play_playlist',$data);
		$this->load->view('audio_view/_footer_audio_tracks_playlist',$data);
	}

}