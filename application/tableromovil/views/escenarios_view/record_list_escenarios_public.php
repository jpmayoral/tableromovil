<?php if(isset($escenarios) && is_array($escenarios) && count($escenarios)>0):?>
	<ul data-role="listview" data-split-icon="gear" data-split-theme="d">
		<?php foreach($escenarios as $f):?>

			<li><a href="#">
				<img src="<?=base_url()?>thumbs/escenarios/<?=$f->escenarios_iconpath?>" />
				<h3><?=$f->escenarios_descripcion?></h3>
				<p>
					<?php if($f->escenarios_estado == 0): ?>
						<div class="desactive">Desactivado</div>
					<?php else: ?>
						<div class="active">Activado</div>
					<?php endif; ?>
				</p>
				</a>
			</li>

		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>
