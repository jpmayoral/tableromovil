<?=$this->load->view('default/_header')?>

<form action="<?=base_url()?>salidad_controller/edit_c/<?=$salidad->salidad_id?>" method="post" name="formEditsalidad" id="formEditsalidad"
	enctype="multipart/form-data" data-ajax="false">

	<input type="hidden" value="<?=$salidad->salidad_id?>" name="salidad_id" id="salidad_id"></input>
	<div data-role="fieldcontain">
		<label for="salidad_relay"><?=$this->config->item('salidad_relay')?>:</label>
		<input type="text" value="<?=$salidad->salidad_relay?>" name="salidad_relay" id="salidad_relay" data-theme="b" readonly="true"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_modulo"><?=$this->config->item('salidad_modulo')?>:</label>
		<select name="salidad_modulo" id="salidad_modulo" data-native-menu="false" data-theme="b">
			<option value="">Seleccione</option>
			<?php foreach ($modulos as $f): ?>
				<?php if($f->tabgral_id == $salidad->salidad_modulo): ?>
					<option value="<?=$f->tabgral_id?>" selected ><?=$f->tabgral_descripcion?></option>
				<?php else: ?>
					<option value="<?=$f->tabgral_id?>"><?=$f->tabgral_descripcion?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<div class="sismenu_content">
			<label for="sismenu_id"><?=$this->config->item('sismenu_id')?>:</label>
			<select name="sismenu_id" id="sismenu_id" data-native-menu="false" data-theme="b" >
				<option value="">Seleccione</option>
				<?php foreach ($sismenus as $f): ?>
					<?php if($f->sismenu_id == $salidad->sismenu_id): ?>
						<option value="<?=$f->sismenu_id?>" selected ><?=$f->sismenu_descripcion?></option>
					<?php else: ?>
						<option value="<?=$f->sismenu_id?>"><?=$f->sismenu_descripcion?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_descripcion"><?=$this->config->item('salidad_descripcion')?>:</label>
		<input type="text" value="<?=$salidad->salidad_descripcion?>" name="salidad_descripcion" id="salidad_descripcion" data-theme="b"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_estado"><?=$this->config->item('salidad_estado')?>:</label>
		<select name="salidad_estado" id="salidad_estado" data-native-menu="false" data-theme="b">
			<option value="">Seleccione</option>
			<?php foreach ($estados as $f): ?>
				<?php if($f->estados_id == $salidad->salidad_estado): ?>
					<option value="<?=$f->estados_id?>" selected ><?=$f->estados_descripcion?></option>
				<?php else: ?>
					<option value="<?=$f->estados_id?>"><?=$f->estados_descripcion?></option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_iconon"><?=$this->config->item('salidad_iconon')?>:</label>
		<input type="file" name="salidad_iconon" id="salidad_iconon"></input>
	</div>
	<div data-role="fieldcontain">
		<label for="salidad_iconoff"><?=$this->config->item('salidad_iconoff')?>:</label>
		<input type="file" name="salidad_iconoff" id="salidad_iconoff"></input>
	</div>
	
	<div class="ui-grid-a">
		<div class="ui-block-a"><a href="<?=base_url()?>salidad_controller/index" data-role="button" data-theme="a">Cancelar</a></div>
		<div class="ui-block-b"><input type="submit" name="modificar" value="Modificar" data-theme="a" />
	</div>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
	
</form>

<script type="text/javascript">
	$(document).ready(function() {
		
		/*$("#salidad_modulo").bind( "change", function(event, ui) {
  			if($(this).val() == 11){
				$(".sismenu_content").attr("display","block")
			}else{
				$(".sismenu_content").attr("display","none")
			}
		});*/
		
	});
</script>

<?=$this->load->view('default/_footer')?>