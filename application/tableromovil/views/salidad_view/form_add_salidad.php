<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>salidad_controller/add_c" method="post" name="formAddsalidad" id="formAddsalidad"
	enctype="multipart/form-data" data-ajax="false">
	<div data-role="fieldcontain">
		<label for="salidad_relay"><?=$this->config->item('salidad_relay')?>:</label>
		<input type="text" name="salidad_relay" id="salidad_relay"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_modulo"><?=$this->config->item('salidad_modulo')?>:</label>
		<input type="text" name="salidad_modulo" id="salidad_modulo"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_descripcion"><?=$this->config->item('salidad_descripcion')?>:</label>
		<input type="text" name="salidad_descripcion" id="salidad_descripcion"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_iconon"><?=$this->config->item('salidad_iconon')?>:</label>
		<input type="file" name="salidad_iconon" id="salidad_iconon"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_iconoff"><?=$this->config->item('salidad_iconoff')?>:</label>
		<input type="file" name="salidad_iconoff" id="salidad_iconoff"></input>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>salidad_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar" data-theme="a" /></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>

<?=$this->load->view('default/_footer')?>

