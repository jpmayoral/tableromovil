<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>cameras_controller/edit_c/<?=$cameras->cameras_id?>" method="post" name="formEditcameras" id="formEditcameras">
	
	<input type="hidden" value="<?=$cameras->cameras_id?>" name="cameras_id" id="cameras_id"  readonly="readonly" data-theme="b"></input>
	
	<div data-role="fieldcontain">
		<label for="cameras_descripcion"><?=$this->config->item('cameras_descripcion')?>:</label>
		<input type="text" value="<?=$cameras->cameras_descripcion?>" name="cameras_descripcion" id="cameras_descripcion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_url"><?=$this->config->item('cameras_url')?>:</label>
		<input type="text" value="<?=$cameras->cameras_url?>" name="cameras_url" id="cameras_url" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_port"><?=$this->config->item('cameras_port')?>:</label>
		<input type="text" value="<?=$cameras->cameras_port?>" name="cameras_port" id="cameras_port" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_user"><?=$this->config->item('cameras_user')?>:</label>
		<input type="text" value="<?=$cameras->cameras_user?>" name="cameras_user" id="cameras_user" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_password"><?=$this->config->item('cameras_password')?>:</label>
		<input type="password" value="<?=$cameras->cameras_password?>" name="cameras_password" id="cameras_password" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_estado"><?=$this->config->item('cameras_estado')?>:</label>
		<select name="cameras_estado" id="cameras_estado" data-native-menu="false">
			<?php foreach ($estados as $f): ?>
				<?php if($f->tabgral_id == $cameras->cameras_estado): ?>
					<option value="<?=$f->tabgral_id?>" selected ><?=$f->tabgral_descripcion?></option>
				<?php else: ?>
					<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="cameras_created_at"><?=$this->config->item('cameras_created_at')?>:</label>
		<input type="text" value="<?=$cameras->cameras_created_at?>" name="cameras_created_at" id="cameras_created_at" data-theme="b" readonly="true"></input>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>cameras_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="modificar" value="Modificar" data-theme="a" />
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
</form>

<?=$this->load->view('default/_footer')?>
