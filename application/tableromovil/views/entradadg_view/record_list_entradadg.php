<?php foreach($rows_entradad as $f): ?>

	<div data-role="fieldcontain">
		<label for="<?=$f->entradad_id?>">
			<?=$f->entradad_descripcion?></label>
			<?php if($f->entradad_value == 0):?>
				<img style="width: 50px; height: 50px;" src="<?=base_url()?>thumbs/entradad/<?=$f->entradad_iconoff?>"/>
			<?php elseif ($f->entradad_value == 1): ?>
				<img style="width: 50px; height: 50px;" src="<?=base_url()?>thumbs/entradad/<?=$f->entradad_iconon?>"/>
			<?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			

		<?php if($flag['u']): ?>
			<select name="<?=$f->entradad_id?>" id="<?=$f->entradad_id?>" data-role="slider" 
				data-theme="b" 
				onChange="setSwitch(this.value,'<?=base_url()?>entradad_controller/editfast_c/<?=$f->entradad_id?>/')">
				<?php if($f->entradad_value == 0): ?>
					<option value="off" selected >Off</option>
					<option value="on">On</option>	
				<?php elseif($f->entradad_value == 1): ?>	
					<option value="off" >Off</option>
					<option value="on" selected>On</option>
				<?php endif; ?>	
			</select>
		<?php else: ?>
				<select name="<?=$f->entradad_id?>" id="<?=$f->entradad_id?>" data-role="slider" 
					data-theme="b" 
					onChange="setSwitch(this.value,'<?=base_url()?>entradad_controller/editfast_c/<?=$f->entradad_id?>/')"
					disabled>
					<?php if($f->entradad_value == 0): ?>
						<option value="off" selected >Off</option>
						<option value="on">On</option>	
					<?php elseif($f->entradad_value == 1): ?>	
						<option value="off" >Off</option>
						<option value="on" selected>On</option>
					<?php endif; ?>	
				</select>
		<?php endif; ?>		
	</div>	

<?php endforeach; ?>
