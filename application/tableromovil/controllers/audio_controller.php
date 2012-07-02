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
				$this->load->helper('directory');
		}
	}

	function index()
	{
		//code here
		$data['title_header']='Audio';
		$this->load->view('default/_header', $data);
		$data['playlist'] = $this->getPlayList();
		$this->load->view('audio_view/home_audio',$data);
		$this->load->view('default/_footer');
	}

	function getPlayList()
	{
		
		return $playlist = directory_map('./sounds/');
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
		$this->load->view('audio_view/_footer_audio_tracks');
	}

}