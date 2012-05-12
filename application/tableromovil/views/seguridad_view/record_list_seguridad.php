<?php foreach ($rows_entradad as $f): ?> 
	<div data-role="fieldcontain">
		<label for="<?=$f->entradad_id?>"><?=$f->entradad_descripcion?></label>

		<!--<?php if($f->entradad_value == 0):?>
			<img style="width: 50px; height: 50px;" src="<?php echo base_url("css/images/icon-tap-water-off.png"); ?>"/>
		<?php elseif ($f->entradad_value == 1): ?>
			<img style="width: 50px; height: 50px;" src="<?php echo base_url("css/images/icon-tap-water-on.png"); ?>"/>
		<?php endif; ?>-->

		<select name="<?=$f->entradad_id?>" id="<?=$f->entradad_id?>" data-role="slider" data-theme="b" onChange="setSwitch(this.value,'<?=base_url()?>entradad_controller/editfast_c/<?=$f->entradad_id?>/')">
			<?php if($f->entradad_value == 0): ?>
				<option value="off" selected>Off</option>
				<option value="on">On</option>
			<?php elseif($f->entradad_value == 1): ?>
				<option value="off">Off</option>	
				<option value ="on" selected>On</option>
			<?php endif;?>
		</select>
	</div>
<?php endforeach; ?>