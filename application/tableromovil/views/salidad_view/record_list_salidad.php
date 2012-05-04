<div id="result-list">
	<?php if(isset($salidad) && is_array($salidad) && count($salidad)>0):?>
		<div class="ui-grid-b">
			<div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:22px">Relay</div></div>
			<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:22px">Descripci&oacute;n</div></div>
			<div class="ui-block-c"><div class="ui-bar ui-bar-a" style="height:22px"></div></div>
		</div>
		<div class="ui-grid-b">
			<?php foreach($salidad as $f):?>
				<div class="ui-block-a"><div class="ui-bar ui-bar-c" style="height:27px"><?=$f->salidad_relay?></div></div>
				<div class="ui-block-b"><div class="ui-bar ui-bar-c" style="height:27px"><?=$f->salidad_descripcion?></div></div>
				<div class="ui-block-c">
					<div class="ui-bar ui-bar-c" style="height:27px">
						<div data-role="controlgroup" data-type="horizontal">
							<?php if($flag['u']):?>
								<a href="<?=base_url()?>index.php/salidad_controller/edit_c/<?=$f->salidad_id?>" data-role="button" data-icon="refresh" data-iconpos="notext" title="Modificar">Modificar</a>
							<?php endif;?>
							<?php if($flag['d']):?>
								<a href="<?=base_url()?>index.php/salidad_controller/delete_c/<?=$f->salidad_id?>" data-role="button" data-icon="delete" data-iconpos="notext" title="Eliminar">Eliminar</a>
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
