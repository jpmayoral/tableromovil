<?=$this->load->view('default/_header')?>
<form action="<?=base_url()?>iluconfig_controller/add_c" method="post" name="formAddiluconfig" id="formAddiluconfig">
	<div data-role="fieldcontain">
		<label for="iluconfig_descripcion"><?=$this->config->item('iluconfig_descripcion')?>:</label>
		<input type="text" name="iluconfig_descripcion" id="iluconfig_descripcion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_id"><?=$this->config->item('salidad_id')?>:</label>
		<select name="salidad_id" id="salidad_id" data-native-menu="false" data-theme="b">
			<?php foreach ($salidas_d as $f): ?>
				<option value="<?=$f->salidad_id?>"><?=$f->salidad_relay?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>iluconfig_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="guardar" value="Guardar" data-theme="a" /></div>
	</div>
	<div class="errors" id="errors">
		<?php
			echo validation_errors();
			if(isset($error)) echo $error;
		?>
	</div>

<?=$this->load->view('default/_footer')?>