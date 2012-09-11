<?php if($flag['r']): ?>
	<div id="result-list">
		<?php if(isset($novedades) && is_array($novedades) && count($novedades)>0):?>
			<div class="ui-grid-solo">
				<div class="ui-block-a">
					<div class="ui-bar ui-bar-a listNov" >
							<select name="sortBy" id="sortBy" data-theme="a" >
								<?php if($sortBy == 'novedades_fecha'):?>
									<option value="novedades_fecha" selected>Fecha</option>
									<option value="novedades_tipo">Tipo</option>
									<option value="novedades_descripcion">Descripci&oacute;n</option>
								<?php elseif($sortBy == 'novedades_tipo'):?>
									<option value="novedades_fecha" >Fecha</option>
									<option value="novedades_tipo" selected>Tipo</option>
									<option value="novedades_descripcion">Descripci&oacute;n</option>
								<?php elseif($sortBy == 'novedades_descripcion'):?>
									<option value="novedades_fecha" >Fecha</option>
									<option value="novedades_tipo">Tipo</option>
									<option value="novedades_descripcion" selected>Descripci&oacute;n</option>
								<?php endif;?>
							</select>
							<select name="sortDirection" id="sortDirection" data-theme="a" >
								<?php if($sortDirection == 'asc'):?>
									<option value="asc" selected>Asc</option>
									<option value="desc" >Desc</option>
								<?php elseif($sortDirection == 'desc'):?>
									<option value="asc">Asc</option>
									<option value="desc" selected>Desc</option>
								<?php endif;?>
							</select> 		
					</div>
				</div>
			</div>
			<div class="ui-grid-solo">
				<?php foreach($novedades as $f):?>
					<div class="ui-block-a">
						<div class="ui-bar ui-bar-c listNov" >
							<?=$f->novedades_descripcion." ".$f->novedades_estado_descripcion?>
								<div class="listTipoNov">
									<?php if($f->novedades_tipo == 0):?>
										<div class="listStateNovCritico"></div>
									<?php elseif($f->novedades_tipo == 1): ?>
										<div class="listStateNovAlerta"></div>
									<?php elseif($f->novedades_tipo == 2): ?>
										<div class="listStateNovInfo"></div>
									<?php endif; ?>
								</div>
							<br>
							<span class="listFechaNov">
								<?=$f->novedades_fechaexacta?>
							</span><br>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<p>No results!</p>
		<?php endif; ?>
	</div>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#sortBy").change(function(){
		var url = '<?=base_url()?>novedades_controller/search_c/0/' + $(this).val() + '/' + $("#sortDirection").val();
		$("#contentDivNovedades").load(url);
	});
	$("#sortDirection").change(function(){
		var url = '<?=base_url()?>novedades_controller/search_c/0/' + $("#sortBy").val() + '/' + $(this).val();
		$("#contentDivNovedades").load(url);
	});
});
</script>