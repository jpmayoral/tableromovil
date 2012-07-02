
	<div class="logo-h">
		<span class="logo">Domotech</span><br>
		<span class="slogan">Contr&oacute;la tu vida</span>
	</div>
	</div> <!-- end div content -->
	<div data-role="footer" id="main-footer" data-position="fixed" data-theme="c">
		<?php if($this->session->userdata('logged_in')): ?>
			<div data-role="navbar" class="nav-glyphish-example" data-grid="a">
				<ul>
					<li><a href="<?=base_url()?>audio_controller/index" id="albums" data-icon="custom">Albunes</a></li>
					<li><a href="<?=base_url()?>audio_controller/showSongs/<?=urlencode($album)?>"  id="song" data-icon="custom">Canciones</a></li>
				</ul>
			</div>
		<?php else: ?>
			<h4><?=$this->config->item('title_footer')?>
		<?php endif; ?>
	</div>
</div> <!-- end div page -->
</body>
</html>