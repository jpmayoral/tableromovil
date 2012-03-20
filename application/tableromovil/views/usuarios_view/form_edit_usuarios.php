<script> setDatePicker(new Array('usuarios_created_at'));</script>
<div id="title-level2"><?=$subtitle?></div>
<div id="form">
<div class="fields-required">Campos obligatorios (*)</div>
<form action="<?=base_url()?>usuarios_controller/edit_c/<?=$usuarios->usuarios_id?>" method="post" name="formEditusuarios" id="formEditusuarios">
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_id')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_id?>" name="usuarios_id" id="usuarios_id"  readonly="readonly"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_username')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_username?>" name="usuarios_username" id="usuarios_username"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_password')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_password?>" name="usuarios_password" id="usuarios_password"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_nombre')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_nombre?>" name="usuarios_nombre" id="usuarios_nombre"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_apellido')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_apellido?>" name="usuarios_apellido" id="usuarios_apellido"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_email')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_email?>" name="usuarios_email" id="usuarios_email"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_direccion')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_direccion?>" name="usuarios_direccion" id="usuarios_direccion"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_telefono')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_telefono?>" name="usuarios_telefono" id="usuarios_telefono"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_estado')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_estado?>" name="usuarios_estado" id="usuarios_estado"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_legajo')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_legajo?>" name="usuarios_legajo" id="usuarios_legajo"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('perfiles_id')?>:</label>
		<input type="text" value="<?=$usuarios->perfiles_id?>" name="perfiles_id" id="perfiles_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('provincias_id')?>:</label>
		<input type="text" value="<?=$usuarios->provincias_id?>" name="provincias_id" id="provincias_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('localidades_id')?>:</label>
		<input type="text" value="<?=$usuarios->localidades_id?>" name="localidades_id" id="localidades_id"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_activationcode')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_activationcode?>" name="usuarios_activationcode" id="usuarios_activationcode"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_tokenforgotpasswd')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_tokenforgotpasswd?>" name="usuarios_tokenforgotpasswd" id="usuarios_tokenforgotpasswd"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_created_at')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_created_at?>" name="usuarios_created_at" id="usuarios_created_at"></input>
	</p>
	<p>
		<label><span class='required'>*</span><?=$this->config->item('usuarios_updated_at')?>:</label>
		<input type="text" value="<?=$usuarios->usuarios_updated_at?>" name="usuarios_updated_at" id="usuarios_updated_at"></input>
	</p>
	<div class="botonera">
		<input type="submit" name="modificar" value="Modificar" class="crudtest-button" id="btn-save" onClick="submitData('formEditusuarios',new Array('right-content','right-content'))"></input>
		<input type="button" name="cancelar" value="Cancelar" class="crudtest-button" id="btn-cancel" onClick="loadPage('<?=base_url()?>usuarios_controller/index','right-content')"></input>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	<div id="busy"><img src="<?=base_url()?>css/images/ajax-loader.gif" /></div></form>
</div>
