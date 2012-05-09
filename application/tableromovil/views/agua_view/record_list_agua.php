<?php foreach ($rows_salidad as $f): ?> 
	<div data-role="fieldcontain">
		<label for="<?=$f->salidad_id?>"><?=$f->salidad_descripcion?></label>

		<?php if($f->salidad_value == 0):?>
			<img style="width: 50px; height: 50px;" src="<?php echo base_url("css/images/icon-tap-water-off.png"); ?>"/>
		<?php elseif ($f->salidad_value == 1): ?>
			<img style="width: 50px; height: 50px;" src="<?php echo base_url("css/images/icon-tap-water-on.png"); ?>"/>
		<?php endif; ?>

		<select name="<?=$f->salidad_id?>" id="<?=$f->salidad_id?>" data-role="slider" data-theme="b" onChange="setSwitch(this.value,'<?=base_url()?>salidad_controller/editfast_c/<?=$f->salidad_id?>/')">
			<?php if($f->salidad_value == 0): ?>
				<option value="off" selected>Off</option>
				<option value="on">On</option>
			<?php elseif($f->salidad_value == 1): ?>
				<option value="off">Off</option>	
				<option value ="on" selected>On</option>
			<?php endif;?>
		</select>
	</div>
<?php endforeach; ?>
