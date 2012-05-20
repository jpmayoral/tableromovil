<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>cameras_controller/add_c" method="post" name="formAddCameras" id="formAddCameras">
	<div data-role="fieldcontain">
		<label for="cameras_descripcion"><?=$this->config->item('cameras_descripcion')?>:</label>
		<input type="text" name="cameras_descripcion" id="cameras_descripcion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_url"><?=$this->config->item('cameras_url')?>:</label>
		<input type="text" name="cameras_url" id="cameras_url" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_port"><?=$this->config->item('cameras_port')?>:</label>
		<input type="text" name="cameras_port" id="cameras_port" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_user"><?=$this->config->item('cameras_user')?>:</label>
		<input type="text" name="cameras_user" id="cameras_user" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_password"><?=$this->config->item('cameras_password')?>:</label>
		<input type="password" name="cameras_password" id="cameras_password" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_estado"><?=$this->config->item('cameras_estado')?>:</label>
		<select name="cameras_estado" id="cameras_estado" data-native-menu="false">
			<?php foreach ($estados as $f): ?>
				<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>cameras_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar" data-theme="a" /></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
</form>

<?=$this->load->view('default/_footer')?>
