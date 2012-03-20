<?=$this->load->view('default/_header')?>
<form action="<?=base_url()?>perfiles_controller/edit_c/<?=$perfiles->perfiles_id?>" method="post" name="formEditperfiles" id="formEditperfiles">
	<div data-role="fieldcontain">
		<label for="perfiles_id"><?=$this->config->item('perfiles_id')?>:</label>
		<input type="text" value="<?=$perfiles->perfiles_id?>" name="perfiles_id" id="perfiles_id"  readonly="readonly"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="perfiles_descripcion"><?=$this->config->item('perfiles_descripcion')?>:</label>
		<input type="text" value="<?=$perfiles->perfiles_descripcion?>" name="perfiles_descripcion" id="perfiles_descripcion"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="perfiles_estado"><?=$this->config->item('perfiles_estado_descripcion')?>:</label>
		<select name="perfiles_estado" id="perfiles_estado" data-native-menu="false">
			<?php foreach ($estados as $f): ?>
				<?php if($f->tabgral_id == $perfiles->perfiles_estado): ?>
					<option value="<?=$f->tabgral_id?>" selected ><?=$f->tabgral_descripcion?></option>
				<?php else: ?>
					<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="perfiles_created_at"><?=$this->config->item('perfiles_created_at')?>:</label>
		<input type="text" value="<?=$perfiles->perfiles_created_at?>" name="perfiles_created_at" id="perfiles_created_at"></input>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>perfiles_controller/index" data-role="button" data-theme="b">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="modificar" value="Modificar" data-theme="b" />
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
</form>
<?=$this->load->view('default/_footer')?>
