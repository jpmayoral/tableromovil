<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="utf-8" />
	<title>Tablero de control movil</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?=base_url()?>css/jquery.mobile-1.1.0/jquery.mobile-1.1.0-rc.1.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="<?=base_url()?>js/jquery.mobile-1.1.0/jquery.mobile-1.1.0-rc.1.min.js"></script>
	<script src="<?=base_url()?>js/fns.js"></script>
</head> 
<body> 

<div data-role="page" data-title="<?=$this->config->item('title_header')?>">

	<div data-role="header" id="main-header">
		<h1><?=$this->config->item('title_header')?></h1>
		<?php if($this->session->userdata('logged_in')): ?>
			<a href="<?=base_url()?>main_controller/index" data-role="button" data-icon="home" data-theme="b" class="ui-btn-left"><?=$this->session->userdata('usuarios_username')?></a>
			<a href="<?=base_url()?>welcome/logout" data-role="button" data-theme="b" class="ui-btn-right">Salir</a>
		<?php else: ?>
			<a href="#" data-role="button" data-icon="home" data-iconpos="notext" data-theme="b" class="ui-btn-left">Inicio</a>
		<?php endif; ?>
	</div>

	<div data-role="content">	