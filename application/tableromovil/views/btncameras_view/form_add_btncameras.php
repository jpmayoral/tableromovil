<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>btncameras_controller/add_c/<?=$cameras_id?>" method="post" name="formAddbtncameras" id="formAddbtncameras">
	<div data-role="fieldcontain">
		<label for="cameras_id"><?=$this->config->item('cameras_descripcion')?>:</label>
		<input type="text" name="cameras_id" id="cameras_id" value="<?=$cameras_id?>"data-theme="b"  readonly="true"/>
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_nombre"><?=$this->config->item('btncameras_nombre')?>:</label>
		<input type="text" name="btncameras_nombre" id="btncameras_nombre" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_label"><?=$this->config->item('btncameras_label')?>:</label>
		<input type="text" name="btncameras_label" id="btncameras_label" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="btncameras_url"><?=$this->config->item('btncameras_url')?>:</label>
		<input type="text" name="btncameras_url" id="btncameras_url" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_modulo_descripcion">M&oacute;dulo:</label>
		<input type="text" name="salidad_modulo_descripcion" id="salidad_modulo_descripcion" value="<?=$modulo->tabgral_descripcion?>" data-theme="b" readonly="true"/>
		<input type="hidden" name="salidad_modulo" id="salidad_modulo" value="<?=$modulo->tabgral_id?>" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_id"><?=$this->config->item('salidad_relay')?>:</label>
		<select name="salidad_id" id="salidad_id" data-native-menu="false">
			<option value="">Seleccione</option>
			<?php foreach ($salidad as $f): ?>
				<option value="<?=$f->salidad_id?>"><?=$f->salidad_relay?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>btncameras_controller/index/<?=$cameras_id?>" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar" data-theme="a" /></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>

</div>

<?=$this->load->view('default/_footer')?>