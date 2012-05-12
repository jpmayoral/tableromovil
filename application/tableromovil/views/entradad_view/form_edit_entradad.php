<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>entradad_controller/edit_c/<?=$entradad->entradad_id?>" method="post" name="formEditentradad" id="formEditentradad">
	<input type="hidden" value="<?=$entradad->entradad_id?>" name="entradad_id" id="entradad_id"></input>
	<div data-role="fieldcontain">
		<label for="entradad_din"><?=$this->config->item('entradad_din')?>:</label>
		<input type="text" value="<?=$entradad->entradad_din?>" name="entradad_din" id="entradad_din" data-theme="b" readonly="true"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="entradad_modulo"><?=$this->config->item('entradad_modulo')?>:</label>
		<select name="entradad_modulo" id="entradad_modulo" data-native-menu="false" data-theme="b" >
			<option value="">Seleccione</option>
			<?php foreach ($modulos as $f): ?>
				<?php if($f->tabgral_id == $entradad->entradad_modulo): ?>
					<option value="<?=$f->tabgral_id?>" selected ><?=$f->tabgral_descripcion?></option>
				<?php else: ?>
					<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="entradad_descripcion"><?=$this->config->item('entradad_descripcion')?>:</label>
		<input type="text" value="<?=$entradad->entradad_descripcion?>" name="entradad_descripcion" id="entradad_descripcion" data-theme="b"></input>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>entradad_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
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