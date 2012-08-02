<?php if(count($albunes)>0): ?>
	<ul data-role="listview">
		<li data-role="list-divider">Albunes</li>
		<?php foreach ($albunes as $key => $value) : ?>	
			<li><a href="<?=base_url()?>audio_controller/showSongs/<?=urlencode($key)?>">
				<img src="<?=base_url()?>css/images/icon-playlist.png" />
				<h3><?=$key?></h3>
				
				</a>
			</li>
		<?php endforeach; ?>
		<?php if(count($playlist) > 0): ?>
			<li data-role="list-divider">Listas de Reproducci&oacute;n</li>
			<?php foreach ($playlist as $f) : ?>	
				<li><a href="<?=base_url()?>audio_controller/showSongsPlayList/<?=$f->playlist_id?>">
					<img src="<?=base_url()?>css/images/icon-playlist.png" />
					<h3><?=$f->playlist_descripcion?></h3>
					
					</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
<?php else: ?>
	<p>No result</p>
<?php endif; ?>