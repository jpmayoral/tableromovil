<!-- Start of third page: #popupNewPlayList -->
<div data-role="dialog" id="popupNewPlayList">

	<div data-role="header" data-theme="b">
		<h1>Nueva</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="b">
		<?php if(count($tracks) > 0):?>
			<?php foreach($tracks as $f):?>
				<input type="hidden" name="tracksSelected" value="<?=$f?>">
			<?php endforeach;?>
		<?php endif;?>	
		<label>Nombre:</label>
		<input type="text" name="playlist_descripcion" id="playlist_descripcion">
		<span id="msjValid"></span>
		<a href="#one" data-role="button" data-inline="true"  onClick="crearLista('<?=base_url()?>playlist_controller/new_c/<?=urlencode($album)?>/')">Aceptar</a>
	</div><!-- /content -->
	
	<div data-role="footer">
		<p><a href="#one" data-rel="back" data-role="button" data-inline="true" data-icon="back">Volver</a></p>	
	</div><!-- /footer -->
</div><!-- /page popup -->




