<script> setDatePicker(new Array('novedades_fecha'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>novedades_controller/add_c" method="post" name="formAddnovedades" id="formAddnovedades">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('novedades_fecha')?>:</label>
		<input type="text" name="novedades_fecha" id="novedades_fecha"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('novedades_descripcion')?>:</label>
		<input type="text" name="novedades_descripcion" id="novedades_descripcion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('novedades_estado')?>:</label>
		<input type="text" name="novedades_estado" id="novedades_estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('novedades_tipo')?>:</label>
		<input type="text" name="novedades_tipo" id="novedades_tipo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('novedades_leido')?>:</label>
		<input type="text" name="novedades_leido" id="novedades_leido"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="guardar" value="Guardar" class="crudtest-button" id="btn-save" onClick="submitData('formAddnovedades',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>novedades_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
