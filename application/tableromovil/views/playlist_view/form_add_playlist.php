<script> setDatePicker(new Array('playlist_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>playlist_controller/add_c" method="post" name="formAddplaylist" id="formAddplaylist">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_descripcion')?>:</label>
		<input type="text" name="playlist_descripcion" id="playlist_descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_id')?>:</label>
		<input type="text" name="usuarios_id" id="usuarios_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_created_at')?>:</label>
		<input type="text" name="playlist_created_at" id="playlist_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_updated_at')?>:</label>
		<input type="text" name="playlist_updated_at" id="playlist_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddplaylist',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>playlist_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
