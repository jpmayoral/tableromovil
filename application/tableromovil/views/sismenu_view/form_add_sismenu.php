<script> setDatePicker(new Array('sismenu_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>index.php/sismenu_controller/add_c" method="post" name="formAddsismenu" id="formAddsismenu">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sismenu_descripcion')?>:</label>
		<input type="text" name="sismenu_descripcion" id="sismenu_descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sismenu_estado')?>:</label>
		<input type="text" name="sismenu_estado" id="sismenu_estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sismenu_parent')?>:</label>
		<input type="text" name="sismenu_parent" id="sismenu_parent"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sismenu_created_at')?>:</label>
		<input type="text" name="sismenu_created_at" id="sismenu_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('sismenu_updated_at')?>:</label>
		<input type="text" name="sismenu_updated_at" id="sismenu_updated_at"></input>
	</p>
	<p>
		<label><?=$this->config->item('sisvinculos_link')?>:</label>
		<input type="text" name="sisvinculos_link" id="sisvinculos_link"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddsismenu',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>sismenu_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
