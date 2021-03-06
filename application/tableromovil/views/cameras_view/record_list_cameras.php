<div id="result-list">
	<?php if(isset($cameras) && is_array($cameras) && count($cameras)>0):?>
		<div class="ui-grid-b">
			<div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:22px">Descripcion</div></div>
			<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:22px">Estado</div></div>
			<div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height:22px"></div></div>
		</div>
		<div class="ui-grid-b">
			<?php foreach($cameras as $f):?>
				<div class="ui-block-a"><div class="ui-bar ui-bar-c" style="height:27px"><?=$f->cameras_descripcion?></div></div>
				<div class="ui-block-b"><div class="ui-bar ui-bar-c" style="height:27px"><?=$f->cameras_estado_descripcion?></div></div>
				<div class="ui-block-c">
					<div class="ui-bar ui-bar-c" style="height:27px">
						<div data-role="controlgroup" data-type="horizontal">
							<?php if($flag['u']):?>
								<a href="<?=base_url()?>index.php/cameras_controller/edit_c/<?=$f->cameras_id?>" data-role="button" data-icon="refresh" data-iconpos="notext" title="Modificar">Modificar</a>
							<?php endif;?>
							<?php if($flag['d']):?>
								<a href="<?=base_url()?>index.php/cameras_controller/delete_c/<?=$f->cameras_id?>" data-role="button" data-icon="delete" data-iconpos="notext" title="Eliminar">Eliminar</a>
							<?php endif;?>
							<?php if($flag['u']):?>
								<a href="<?=base_url()?>index.php/btncameras_controller/index/<?=$f->cameras_id?>" data-role="button" data-icon="grid" data-iconpos="notext" title="Botones">Botones</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>	
	<?php else: ?>
		<p>No results!</p>
	<?php endif; ?>
</div>
<script type="text/javascript">
	$(document).ready(function(){  });
</script>
