<?=$this->load->view('default/_header')?>
<form action="<?=base_url()?>perfiles_controller/add_c" method="post" name="formAddperfiles" id="formAddperfiles">
	<div data-role="fieldcontain">
		<label for="perfiles_descripcion"><?=$this->config->item('perfiles_descripcion')?>:</label>
		<input type="text" name="perfiles_descripcion" id="perfiles_descripcion"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="perfiles_estado"><?=$this->config->item('perfiles_estado')?>:</label>
		<select name="perfiles_estado" id="perfiles_estado" data-native-menu="false">
			<?php foreach ($estados as $f): ?>
				<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>perfiles_controller/index" data-role="button" data-theme="b">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar" data-theme="b" /></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
</form>
<?=$this->load->view('default/_footer')?>
