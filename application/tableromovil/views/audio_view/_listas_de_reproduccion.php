<!-- Start of third page: #popupPlayList -->
<div data-role="dialog" id="popupPlayList">

	<div data-role="header" data-theme="b">
		<h1>Listas de Reproducci&oacute;n</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="b">
		<div class="contentPlayList">
			<?php if(count($tracks) > 0):?>
				<?php foreach($tracks as $f):?>
					<input type="hidden" name="tracksSelected" value="<?=$f?>">
				<?php endforeach;?>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b">
					<li><a href="#" id="newPlayList" onClick="showFormNewPlayList('<?=base_url()?>playlist_controller/showFormNewPlayList/<?=urlencode($album)?>/')">Nueva</a></li>
					<?php if(count($playlist)>0):?>
						<?php foreach($playlist as $f):?>
							<li><a href="#" onClick="agregarSongsToLista('<?=base_url()?>playlist_controller/modify_m/<?=$f->playlist_id?>/<?=urlencode($album)?>/')">
								<?=$f->playlist_descripcion?></a></li>
						<?php endforeach; ?>
					<?php endif;?>
				</ul>
			<?php else:?>
				<?=$state?>
			<?php endif;?>
		</div>
		<div class="checkSelected"></div>
	</div><!-- /content -->
	
</div><!-- /page popup -->


