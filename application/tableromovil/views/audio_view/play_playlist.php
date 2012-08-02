<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, [

		<?php $i=1; $total = count($tracks); 
			for($j=0; $j < count($tracks); $j++): ?>
			{
				title:'<?=$titulos[$j]?>',
				mp3:'<?=base_url()."sounds/".$tracks[$j].".mp3"?>',
				oga:'<?=base_url()."sounds/".$tracks[$j].".ogg"?>',
			}
			<?php if($i <= ($total -1)): ?>
				,
			<?php endif; ?>
		<?php $i++; endfor; ?>
		
	], {
		playlistOptions: { 
    		autoPlay: true 
  		}, 
		swfPath: "<?=base_url()?>js/jplayer",
		supplied: "mp3,oga",
		solution:"flash,html",
		wmode: "window"
	});
});
//]]>
</script>

<div id="jquery_jplayer_1" class="jp-jplayer"></div>

<div id="jp_container_1" class="jp-audio">
	<div class="jp-type-playlist">
		<div class="jp-gui jp-interface">
			<ul class="jp-controls">
				<li><a href="javascript:;" class="jp-previous" tabindex="1">Previo</a></li>
				<li><a href="javascript:;" class="jp-play" tabindex="1">Reproducir</a></li>
				<li><a href="javascript:;" class="jp-pause" tabindex="1">Pausa</a></li>
				<li><a href="javascript:;" class="jp-next" tabindex="1">Siguiente</a></li>
				<li><a href="javascript:;" class="jp-stop" tabindex="1">Detener</a></li>
				<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">Silencio</a></li>
				<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">Sonar</a></li>
				<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">M&aacute;ximo vol.</a></li>
			</ul>
			<div class="jp-progress">
				<div class="jp-seek-bar">
					<div class="jp-play-bar"></div>

				</div>
			</div>
			<div class="jp-volume-bar">
				<div class="jp-volume-bar-value"></div>
			</div>
			<div class="jp-current-time"></div>
			<div class="jp-duration"></div>
			<ul class="jp-toggles">
				<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">Aleatorio</a></li>
				<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">Desactivar Aleatorio</a></li>
				<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">Repetir</a></li>
				<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">Desactivar repetir</a></li>
			</ul>
		</div>
		<div class="jp-playlist">
			<ul>
				<li></li>
			</ul>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
