<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>escenarios_controller/add_c" method="post" enctype="multipart/form-data" 
	name="formAddescenarios" id="formAddescenarios" data-ajax="false">
	<div data-role="fieldcontain">
		<label for="escenarios_descripcion"><?=$this->config->item('escenarios_descripcion')?>:</label>
		<input type="text" name="escenarios_descripcion" id="escenarios_descripcion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="escenarios_estado"><?=$this->config->item('escenarios_estado')?>:</label>
		<select name="escenarios_estado" id="escenarios_estado" data-native-menu="false">
				<option value="0">Desactivado</option>
				<option value="1">Activado</option>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="escenarios_iconpath"><?=$this->config->item('escenarios_iconpath')?>:</label>
		<input type="file" name="escenarios_iconpath" id="escenarios_iconpath" ></input>
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