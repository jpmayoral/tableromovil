<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>entradad_controller/add_c" method="post" name="formAddentradad" id="formAddentradad"
	enctype="multipart/form-data" data-ajax="false">

	<div data-role="fieldcontain">
		<label><span class='required'>*</span><?=$this->config->item('entradad_din')?>:</label>
		<input type="text" name="entradad_din" id="entradad_din"></input>
	</div>
	<div data-role="fieldcontain">
		<label><span class='required'>*</span><?=$this->config->item('entradad_value')?>:</label>
		<input type="text" name="entradad_value" id="entradad_value"></input>
	</div>
	<div data-role="fieldcontain">
		<label><span class='required'>*</span><?=$this->config->item('entradad_modulo')?>:</label>
		<input type="text" name="entradad_modulo" id="entradad_modulo"></input>
	</div>
	<div data-role="fieldcontain">
		<label><span class='required'>*</span><?=$this->config->item('entradad_descripcion')?>:</label>
		<input type="text" name="entradad_descripcion" id="entradad_descripcion"></input>
	</div>
	<div data-role="fieldcontain">
		<label><span class='required'>*</span><?=$this->config->item('entradad_created_at')?>:</label>
		<input type="text" name="entradad_created_at" id="entradad_created_at"></input>
	</div>
	<div data-role="fieldcontain">
		<label><span class='required'>*</span><?=$this->config->item('entradad_updated_at')?>:</label>
		<input type="text" name="entradad_updated_at" id="entradad_updated_at"></input>
	</div>
	
	<div data-role="fieldcontain">
		<label for="entradad_iconon"><?=$this->config->item('entradad_iconon')?>:</label>
		<input type="file" name="entradad_iconon" id="entradad_iconon"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="entradad_iconoff"><?=$this->config->item('entradad_iconoff')?>:</label>
		<input type="file" name="entradad_iconoff" id="entradad_iconoff"></input>
	</div>

	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>entradad_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar" data-theme="a" /></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>

<?=$this->load->view('default/_footer')?>