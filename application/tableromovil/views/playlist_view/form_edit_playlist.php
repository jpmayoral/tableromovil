<script> setDatePicker(new Array('playlist_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>playlist_controller/edit_c/<?=$playlist->playlist_id?>" method="post" name="formEditplaylist" id="formEditplaylist">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_id')?>:</label>
		<input type="text" value="<?=$playlist->playlist_id?>" name="playlist_id" id="playlist_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_descripcion')?>:</label>
		<input type="text" value="<?=$playlist->playlist_descripcion?>" name="playlist_descripcion" id="playlist_descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_id')?>:</label>
		<input type="text" value="<?=$playlist->usuarios_id?>" name="usuarios_id" id="usuarios_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_created_at')?>:</label>
		<input type="text" value="<?=$playlist->playlist_created_at?>" name="playlist_created_at" id="playlist_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('playlist_updated_at')?>:</label>
		<input type="text" value="<?=$playlist->playlist_updated_at?>" name="playlist_updated_at" id="playlist_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditplaylist',new Array('right-content','right-content'))"></input>
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
