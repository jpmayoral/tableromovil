	<script type="text/javascript">
		$(document).ready(function() {
			$("#playmusic").click(function (e) {
			    e.stopImmediatePropagation();
			    e.preventDefault();
			    loadPageChk('<?=base_url()?>audio_controller/playMusicPlayList/','songsplay');
			});
			
		});


		function loadPageChk(url,chk){

			var tracks=''; var playlist = '';
		    $.each($("input[name="+chk+"]:checked"), function() {
		      //list.push($(this).val());
		      tracks = tracks +  $(this).val() + ',';
		      playlist = playlist + $("#in_playlist_" + $(this).attr('class')).val() + ',' 
		    });
		    if(tracks.length > 0){ 
		    	var playlist_id = $("#playlist_id").val();
		    	var nameplaylist = $("#nameplaylist").val();
		    	window.location = url + playlist_id +'/'+ encodeURIComponent(nameplaylist) + "/" + encodeURIComponent(playlist) + '/'+ encodeURIComponent(tracks);          
		    }else{
		       // showAleatoryMessage('Selecciona al menos un registro!');
		    }
		}

	</script>
	<div class="logo-h">
		<span class="logo">Domotech</span><br>
		<span class="slogan">Contr&oacute;la tu vida</span>
	</div>

	</div> <!-- end div content -->
	<div data-role="footer" id="main-footer" data-position="fixed" data-theme="c">
		<?php if($this->session->userdata('logged_in')): ?>
			<div data-role="navbar" class="nav-glyphish-example">
				<ul>
					<li><a href="<?=base_url()?>audio_controller/index" id="albums" data-icon="custom">Albunes</a></li>
					<li><a href="#" id="playmusic" data-icon="custom"
						onClick="loadPageChk('<?=base_url()?>audio_controller/playMusicPlayList/','songsplay')">Reproducir</a></li>
				</ul>
			</div>
		<?php else: ?>
			<h4><?=$this->config->item('title_footer')?>
		<?php endif; ?>
	</div>

</div> <!-- end div page -->

</html>