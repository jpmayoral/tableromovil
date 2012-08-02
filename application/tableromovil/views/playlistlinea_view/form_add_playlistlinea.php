<script> setDatePicker(new Array('playlistlinea_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>playlistlinea_controller/add_c" method="post" name="formAddplaylistlinea" id="formAddplaylistlinea">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_path')?>:</label>
		<input type="text" name="playlistlinea_path" id="playlistlinea_path"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_namesong')?>:</label>
		<input type="text" name="playlistlinea_namesong" id="playlistlinea_namesong"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_id')?>:</label>
		<input type="text" name="playlist_id" id="playlist_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_created_at')?>:</label>
		<input type="text" name="playlistlinea_created_at" id="playlistlinea_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_updated_at')?>:</label>
		<input type="text" name="playlistlinea_updated_at" id="playlistlinea_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddplaylistlinea',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>playlistlinea_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
