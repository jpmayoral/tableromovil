<?php if(isset($escenarios) && is_array($escenarios) && count($escenarios)>0):?>
	<ul data-role="listview" data-split-icon="gear" data-split-theme="d">
		<?php foreach($escenarios as $f):?>

			<li><a href="#">
				<img src="<?=base_url()?>thumbs/escenarios/<?=$f->escenarios_iconpath?>" />
				<h3><?=$f->escenarios_descripcion?></h3>
				<?php if($f->escenarios_estado == 0): ?>
					<div class="desactive">Estado: Desactivado</div>
				<?php else: ?>
					<div class="active">Estado: Activado</div>
				<?php endif; ?>
				<p style="padding-left: 40px; font-size: 1em;">
					<?php if($flag['u']):?>
						<a href="<?=base_url()?>escenarios_controller/edit_c/<?=$f->escenarios_id?>" title="Modificar">Modificar</a>
					<?php endif;?>
					<?php if($flag['d']):?>
						<a href="#" onClick="deleteRow('<?=base_url()?>escenarios_controller/delete_c/<?=$f->escenarios_id?>')" title="Eliminar">Eliminar</a>
					<?php endif;?>
				</p>
				</a>
			</li>

		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function(){ 

	});
</script>