<!--<?php if(count($songs)>0): ?>
	<ul data-role="listview">
		<?php foreach ($songs as $key => $value) : ?>	
			<li><a href="<?=base_url()?>audio_controller/showSongs/<?=urlencode($value)?>">
				<img src="<?=base_url()?>css/images/icon-playlist.png" />
				<h3><?=$value?></h3>
				
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>No result</p>
<?php endif; ?>
-->

<?php if(count($songs)>0): ?>
		<input type="hidden" name="album" id="album" value="<?=$album?>" />
		<?php foreach ($songs as $key => $value) : ?>	
			
				<input type="checkbox" name="songsplay" id="<?=$value?>" value="<?=$value?>" data-theme="a"/>
				<label for="<?=$value?>"><?=$value?></label>
			
		<?php endforeach; ?>
	
<?php else: ?>
	<p>No result</p>
<?php endif; ?>
