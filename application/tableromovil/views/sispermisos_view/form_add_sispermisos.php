<script> setDatePicker(new Array('sispermisos_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>sispermisos_controller/add_c" method="post" name="formAddsispermisos" id="formAddsispermisos">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_tabla')?>:</label>
		<input type="text" name="sispermisos_tabla" id="sispermisos_tabla"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_flag_read')?>:</label>
		<input type="text" name="sispermisos_flag_read" id="sispermisos_flag_read"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_flag_insert')?>:</label>
		<input type="text" name="sispermisos_flag_insert" id="sispermisos_flag_insert"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_flag_update')?>:</label>
		<input type="text" name="sispermisos_flag_update" id="sispermisos_flag_update"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_flag_delete')?>:</label>
		<input type="text" name="sispermisos_flag_delete" id="sispermisos_flag_delete"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('perfiles_id')?>:</label>
		<input type="text" name="perfiles_id" id="perfiles_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_created_at')?>:</label>
		<input type="text" name="sispermisos_created_at" id="sispermisos_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sispermisos_updated_at')?>:</label>
		<input type="text" name="sispermisos_updated_at" id="sispermisos_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddsispermisos',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>sispermisos_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
