<script> setDatePicker(new Array('iluconfig_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>iluconfig_controller/edit_c/<?=$iluconfig->iluconfig_id?>" method="post" name="formEditiluconfig" id="formEditiluconfig">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('iluconfig_id')?>:</label>
		<input type="text" value="<?=$iluconfig->iluconfig_id?>" name="iluconfig_id" id="iluconfig_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('iluconfig_descripcion')?>:</label>
		<input type="text" value="<?=$iluconfig->iluconfig_descripcion?>" name="iluconfig_descripcion" id="iluconfig_descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('salidad_id')?>:</label>
		<input type="text" value="<?=$iluconfig->salidad_id?>" name="salidad_id" id="salidad_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('iluconfig_created_at')?>:</label>
		<input type="text" value="<?=$iluconfig->iluconfig_created_at?>" name="iluconfig_created_at" id="iluconfig_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('iluconfig_updated_at')?>:</label>
		<input type="text" value="<?=$iluconfig->iluconfig_updated_at?>" name="iluconfig_updated_at" id="iluconfig_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditiluconfig',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>iluconfig_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
