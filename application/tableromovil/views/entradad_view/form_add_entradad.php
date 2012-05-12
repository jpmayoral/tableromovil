<script> setDatePicker(new Array('entradad_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>entradad_controller/add_c" method="post" name="formAddentradad" id="formAddentradad">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('entradad_din')?>:</label>
		<input type="text" name="entradad_din" id="entradad_din"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('entradad_value')?>:</label>
		<input type="text" name="entradad_value" id="entradad_value"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('entradad_modulo')?>:</label>
		<input type="text" name="entradad_modulo" id="entradad_modulo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('entradad_descripcion')?>:</label>
		<input type="text" name="entradad_descripcion" id="entradad_descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('entradad_created_at')?>:</label>
		<input type="text" name="entradad_created_at" id="entradad_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('entradad_updated_at')?>:</label>
		<input type="text" name="entradad_updated_at" id="entradad_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddentradad',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>entradad_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
