<?=$this->load->view('default/_header')?>
<form action="<?=base_url()?>usuarios_controller/add_c" method="post" name="formAddusuarios" id="formAddusuarios">
	<div data-role="fieldcontain">
		<label for="usuarios_username"><?=$this->config->item('usuarios_username')?>:</label>
		<input type="text" name="usuarios_username" id="usuarios_username" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_password"><?=$this->config->item('usuarios_password')?>:</label>
		<input type="password" name="usuarios_password" id="usuarios_password" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_nombre"><?=$this->config->item('usuarios_nombre')?>:</label>
		<input type="text" name="usuarios_nombre" id="usuarios_nombre" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_apellido"><?=$this->config->item('usuarios_apellido')?>:</label>
		<input type="text" name="usuarios_apellido" id="usuarios_apellido" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_email"><?=$this->config->item('usuarios_email')?>:</label>
		<input type="text" name="usuarios_email" id="usuarios_email" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_direccion"><?=$this->config->item('usuarios_direccion')?>:</label>
		<input type="text" name="usuarios_direccion" id="usuarios_direccion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_telefono"><?=$this->config->item('usuarios_telefono')?>:</label>
		<input type="text" name="usuarios_telefono" id="usuarios_telefono" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_estado"><?=$this->config->item('usuarios_estado')?>:</label>
		<select name="usuarios_estado" id="usuarios_estado" data-native-menu="false">
			<?php foreach ($estados as $f): ?>
				<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
		<select name="perfiles_id" id="perfiles_id" data-native-menu="false">
			<?php foreach ($perfiles as $f): ?>
				<option value="<?=$f->perfiles_id?>"><?=$f->perfiles_descripcion?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<!--<div data-role="fieldcontain">
		<label for="provincias_id"><?=$this->config->item('provincias_id')?>:</label>
		<input type="text" name="provincias_id" id="provincias_id"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="localidades_id"><?=$this->config->item('localidades_id')?>:</label>
		<input type="text" name="localidades_id" id="localidades_id"></input>
	</div>-->
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>usuarios_controller/index" data-role="button" data-theme="b">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar"  class="ui-block-b" data-role="button" data-theme="b"/></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
<?=$this->load->view('default/_footer')?>