<?php if(count($songs)>0): ?>
		<h3>
			<input type="checkbox" name="selectAll" id="selectAll" data-theme="k"/>
			<label for="selectAll">Seleccionar Todos</label>
		</h3>
		<div  data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				
				<input type="hidden" name="album" id="album" value="<?=$album?>" />
				<?php foreach ($songs as $key => $value) : ?>	
					
						<input type="checkbox" name="songsplay-<?=$value?>" id="songsplay-<?=$value?>" value="<?=$value?>" class="pistas" data-theme="a"/>
						<label for="songsplay-<?=$value?>"><?=$value?></label>
					
				<?php endforeach; ?>
			</fieldset>
		</div>
<?php else: ?>
	<p>No result</p>
<?php endif; ?>


<script type="text/javascript">
	$(document).ready(function(){ 
		$('h3 input[type=checkbox]').click(function() {
		    $(".pistas")
		        .attr({
		            checked: $(this).is(':checked')
		        });
		    $(".pistas").checkboxradio("refresh");
		});

	});
</script>