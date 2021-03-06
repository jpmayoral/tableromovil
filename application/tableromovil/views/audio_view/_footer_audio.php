
	<script type="text/javascript">

		$(document).ready(function() {
			$("#playmusic").click(function (e) {
			    e.stopImmediatePropagation();
			    e.preventDefault();
			    loadPageChk('<?=base_url()?>audio_controller/playMusic/');
			});

			$("#playlist").click(function (e) {
			    e.stopImmediatePropagation();
			    e.preventDefault();
			    checkSelectedSongs("<?=base_url()?>playlist_controller/showPlayList/");

			});
			
			
		});	
	</script>

	<?=$this->load->view('default/_logo.php')?>

	</div> <!-- end div content -->
	<div data-role="footer" id="main-footer" data-position="fixed" data-theme="c">
		<?php if($this->session->userdata('logged_in')): ?>
			<div data-role="navbar" class="nav-glyphish-example">
				<ul>
					<li><a href="<?=base_url()?>audio_controller/index" id="albums" data-icon="custom">Albunes</a></li>
					<li><a href="#" id="playlist" data-icon="custom">Listas</a></li>
					<li><a href="#" id="playmusic" data-icon="custom"
						onClick="loadPageChk('<?=base_url()?>audio_controller/playMusic/')">Reproducir</a></li>
				</ul>
			</div>
		<?php else: ?>
			<h4><?=$this->config->item('title_footer')?>
		<?php endif; ?>
	</div>

</div> <!-- end div page -->


</html>
