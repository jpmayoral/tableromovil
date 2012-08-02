<!-- Start of third page: #popupResultPlayList -->
<div data-role="dialog" id="popupResultPlayList">

	<div data-role="header" data-theme="b">
		<h1>Lista de Reproducci&oacute;n</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="b">	
		<div class="resultPL">
			<?=$state?>
		</div>
		<a href="#" data-role="button" data-inline="true" onClick="showAlbunes('<?=base_url()?>audio_controller/')">Aceptar</a>
	</div><!-- /content -->
	
</div><!-- /page popup -->
