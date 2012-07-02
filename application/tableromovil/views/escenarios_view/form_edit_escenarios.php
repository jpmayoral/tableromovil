<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>escenarios_controller/edit_c" method="post" enctype="multipart/form-data" 
	name="formeditescenarios" id="formeditescenarios" data-ajax="false">
	<div data-role="fieldcontain" >
		<label for="escenarios_id"><?=$this->config->item('escenarios_id')?>:</label>
		<input type="text" value="<?=$escenario->escenarios_id?>" name="escenarios_id" id="escenarios_id"  readonly="readonly" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="escenarios_descripcion"><?=$this->config->item('escenarios_descripcion')?>:</label>
		<input type="text" value="<?=$escenario->escenarios_descripcion?>" name="escenarios_descripcion" id="escenarios_descripcion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="escenarios_estado"><?=$this->config->item('escenarios_estado')?>:</label>
		<select name="escenarios_estado" id="escenarios_estado" data-native-menu="false">
			<?php if($escenario->escenarios_estado == 0): ?>
				<option value="0" selected>Desactivado</option>
				<option value="1">Activado</option>
			<?php elseif($escenario->escenarios_estado == 1): ?>
				<option value="1" seleted>Activado</option>
				<option value="0" >Desactivado</option>
			<?php endif; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="escenarios_iconpath"><?=$this->config->item('escenarios_iconpath')?>:</label>
		<input type="file" name="escenarios_iconpath" id="escenarios_iconpath"></input>
	</div>
	
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>escenarios_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar"  class="ui-block-b" data-role="button" data-theme="a"/></div>
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>

<?=$this->load->view('default/_footer')?>