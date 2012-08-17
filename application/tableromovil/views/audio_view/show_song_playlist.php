<?php if(count($songs)>0): ?>
		<h3>
			<input type="checkbox" name="selectAll" id="selectAll" data-theme="k"/>
			<label for="selectAll">Seleccionar Todos</label>
			<input type="hidden" name="nameplaylist" id="nameplaylist" value="<?=$title_header?>">
			<input type="hidden" name="playlist_id" id="playlist_id" value="<?=$playlist_id?>">
		</h3>
		<div  data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<?php foreach ($songs as $f) : ?>	
				<input type="hidden" name="in-playlist" id="in_playlist_<?=$f->playlistlinea_id?>" value="<?=$f->playlistlinea_path?>"/>	
				<input type="checkbox" name="songsplay-<?=$f->playlistlinea_id?>" id="songsplay-<?=$f->playlistlinea_id?>" value="<?=$f->playlistlinea_namesong?>" data-theme="k" class="pistas"/>
				<label for="songsplay-<?=$f->playlistlinea_id?>"><?=$f->playlistlinea_namesong?></label>
					
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