<?php if(count($playlist)>0): ?>
	<ul data-role="listview">
		<?php foreach ($playlist as $key => $value) : ?>	
			<li><a href="<?=base_url()?>audio_controller/showSongs/<?=urlencode($key)?>">
				<img src="<?=base_url()?>css/images/icon-playlist.png" />
				<h3><?=$key?></h3>
				
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>No result</p>
<?php endif; ?>