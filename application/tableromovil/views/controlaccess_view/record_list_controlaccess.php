<?php if(isset($rows_cameras) && is_array($rows_cameras) && count($rows_cameras) > 0): ?>
	<div data-role="collapsible-set" data-theme="a" data-content-theme="j" >
		<?php foreach ($rows_cameras as $f): ?> 
			<div data-role="collapsible" data-collapsed="false" >
				<h3><?=$f->cameras_descripcion?></h3>
				<div class="contentCamera">
					<img id="imgDisplay" alt="video" src="" onload="load_video()" width="320" height="240">
				</div>
			</div>
			<script type="text/javascript"> 
					var count =0;
					var xx = new Image();

					function body_onload(){
						load_video();
					}	
					function reload_image(){		
						var urlstring = "user=<?=$f->cameras_user?>&pwd=<?=$f->cameras_password?>&next_url=tempsnapshot.jpg&count=" + count ;	
						xx.src = "<?=$f->cameras_url?>:<?=$f->cameras_port?>/snapshot.cgi?" + urlstring;	
						imgDisplay.src = xx.src;			
						count++;	
					}
					function load_video(){    
						reload_image();	
						//setTimeout("reload_image()",100);
					}
					window.onload = body_onload();

			</script>
		<?php endforeach; ?>
	</div>

<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<style type="text/css">
.contentCamera{
	/*background-image: -webkit-gradient(linear, left top, left bottom, from( #dbe8c4 ), to( #5e6354 )); 
	background-image: -webkit-linear-gradient( #444 , #222 ); 
	background-image:    -moz-linear-gradient( #444 , #222 ); 
	background-image:     -ms-linear-gradient( #444 , #222 ); 
	background-image:      -o-linear-gradient( #444 , #222 ); 
	background-image:         linear-gradient( #444 , #222 );	
	opacity: 0.6;
	-moz-opacity: 0.6;
	filter:alpha(opacity=0.6);*/
	background-color: rgba(13, 33, 0, 0.3);
}
</style>