<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>btncameras_controller/edit_c/<?=$btncameras->btncameras_id?>" method="post" name="formEditbtncameras" id="formEditbtncameras">
	
	<input type="hidden" value="<?=$btncameras->btncameras_id?>" name="btncameras_id" id="btncameras_id" />
	<div data-role="fieldcontain">
		<label for="cameras_descripcion"><?=$this->config->item('cameras_descripcion')?>:</label>
		<input type="text" value="<?=$btncameras->cameras_descripcion?>" name="cameras_descripcion" id="cameras_descripcion" data-theme="b" readonly="true"/>
		<input type="hidden" value="<?=$btncameras->cameras_id?>" name="cameras_id" id="cameras_id" />
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_nombre"><?=$this->config->item('btncameras_nombre')?>:</label>
		<input type="text" value="<?=$btncameras->btncameras_nombre?>" name="btncameras_nombre" id="btncameras_nombre" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_label"><?=$this->config->item('btncameras_label')?>:</label>
		<input type="text" value="<?=$btncameras->btncameras_label?>" name="btncameras_label" id="btncameras_label" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_url"><?=$this->config->item('btncameras_url')?>:</label>
		<input type="text" value="<?=$btncameras->btncameras_url?>" name="btncameras_url" id="btncameras_url" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_relay"><?=$this->config->item('salidad_id')?>:</label>
		<input type="text" value="<?=$btncameras->salidad_relay?>" name="salidad_relay" id="salidad_relay" data-theme="b" readonly="true"/>
		<input type="hidden" value="<?=$btncameras->salidad_id?>" name="salidad_id" id="salidad_id" />
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_modulo_descripcion"><?=$this->config->item('salidad_modulo_descripcion')?>:</label>
		<input type="text" value="<?=$btncameras->salidad_modulo_descripcion?>" name="salidad_modulo_descripcion" id="salidad_modulo_descripcion" data-theme="b" readonly="true"/>
		<input type="hidden" value="<?=$btncameras->salidad_modulo?>" name="salidad_modulo" id="salidad_modulo" />
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_created_at"><?=$this->config->item('btncameras_created_at')?>:</label>
		<input type="text" value="<?=$btncameras->btncameras_created_at?>" name="btncameras_created_at" id="btncameras_created_at" data-theme="b" readonly="true"/>
	</div>
	
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>btncameras_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="modificar" value="Modificar" data-theme="a" />
	</div>

	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	
</div>

<?=$this->load->view('default/_footer')?>