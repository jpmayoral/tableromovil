
<div id="result-list">
	<?php if(isset($usuarios) && is_array($usuarios) && count($usuarios)>0):?>
		<div class="ui-grid-b">
			<div class="ui-block-a"><div class="ui-bar ui-bar-b" style="height:22px">Username</div></div>
			<div class="ui-block-b"><div class="ui-bar ui-bar-b" style="height:22px">Perfil</div></div>
			<div class="ui-block-c"><div class="ui-bar ui-bar-b" style="height:22px"></div></div>
		</div>
		<div class="ui-grid-b">
			<?php foreach($usuarios as $f):?>
				<div class="ui-block-a"><div class="ui-bar ui-bar-c" style="height:27px"><?=$f->usuarios_username?></div></div>
				<div class="ui-block-b"><div class="ui-bar ui-bar-c" style="height:27px"><?=$f->perfiles_id?></div></div>
				<div class="ui-block-c">
					<div class="ui-bar ui-bar-c" style="height:27px">
						<div data-role="controlgroup" data-type="horizontal">
							<?php if($flag['u']):?>
								<a href="#" onClick="loadPage('<?=base_url()?>index.php/usuarios_controller/edit_c/<?=$f->usuarios_id?>','right-content')" data-role="button" data-icon="refresh" data-iconpos="notext" title="Modificar">Modificar</a>
							<?php endif;?>
							<?php if($flag['d']):?>
								<a href="#" onClick="deleteData('<?=base_url()?>index.php/usuarios_controller/delete_c/<?=$f->usuarios_id?>','right-content','¿Estás seguro de eliminar este item?')" data-role="button" data-icon="delete" data-iconpos="notext" title="Eliminar">Eliminar</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>	
		<?php if(isset($pagination)):?>
			<div class='pagination'>
				<?=$pagination?>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<p>No results!</p>
	<?php endif; ?>
</div>
<script type="text/javascript">
	$(document).ready(function(){ setPaginationTwo('result-list','formSearchusuarios'); });
</script>