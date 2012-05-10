<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="utf-8" />
	<title>Tablero de control movil</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?=base_url()?>css/jquery.mobile-1.1.0/jquery.mobile-1.1.0-rc.1.css" />
	<link rel="stylesheet" href="<?=base_url()?>css/custom-style.css" />
	<!--<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>-->
	<script src="<?=base_url()?>js/jquery-v1.7.1.js"></script>
	<script src="<?=base_url()?>js/fns.js"></script>
	<script src="<?=base_url()?>js/jquery.mobile-1.1.0/jquery.mobile-1.1.0-rc.1.min.js"></script>
	<script>
		$(document).ready(function() {
		  if (navigator.userAgent.match(/Android/i)) {
		    window.scrollTo(0,0); // reset in case prev not scrolled  
		    var nPageH = $(document).height();
		    var nViewH = window.outerHeight;
		    if (nViewH > nPageH) {
		      nViewH = nViewH / window.devicePixelRatio;
		      $('body').css('height',nViewH + 'px');
		    }
		    window.scrollTo(0,1);
		  }

		});
	</script>
</head> 
<body> 

<div data-role="page" data-title="<?=$this->config->item('title_header')?>" data-fullscreen="true">

	<div data-role="header" id="main-header" data-position="fixed">
		<h1><?=$title_header?></h1>
		<?php if($this->session->userdata('logged_in')): ?>
			<a href="<?=base_url()?>main_controller/index" class="ui-btn-left">Home</a>
			<a href="<?=base_url()?>welcome/logout" id="login" class="ui-btn-right">Salir</a>
		<?php endif; ?>
	</div>

	<div data-role="content" data-theme="h">	
		