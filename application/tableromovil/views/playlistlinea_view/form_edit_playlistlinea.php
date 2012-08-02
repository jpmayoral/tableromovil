<script> setDatePicker(new Array('playlistlinea_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>playlistlinea_controller/edit_c/<?=$playlistlinea->playlistlinea_id?>" method="post" name="formEditplaylistlinea" id="formEditplaylistlinea">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_id')?>:</label>
		<input type="text" value="<?=$playlistlinea->playlistlinea_id?>" name="playlistlinea_id" id="playlistlinea_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_path')?>:</label>
		<input type="text" value="<?=$playlistlinea->playlistlinea_path?>" name="playlistlinea_path" id="playlistlinea_path"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_namesong')?>:</label>
		<input type="text" value="<?=$playlistlinea->playlistlinea_namesong?>" name="playlistlinea_namesong" id="playlistlinea_namesong"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_id')?>:</label>
		<input type="text" value="<?=$playlistlinea->playlist_id?>" name="playlist_id" id="playlist_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_created_at')?>:</label>
		<input type="text" value="<?=$playlistlinea->playlistlinea_created_at?>" name="playlistlinea_created_at" id="playlistlinea_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlistlinea_updated_at')?>:</label>
		<input type="text" value="<?=$playlistlinea->playlistlinea_updated_at?>" name="playlistlinea_updated_at" id="playlistlinea_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditplaylistlinea',new Array('right-content','right-content'))"></input>
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
