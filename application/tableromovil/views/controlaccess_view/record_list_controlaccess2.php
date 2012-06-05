<?php if(isset($rows_cameras) && is_array($rows_cameras) && count($rows_cameras) > 0): ?>
	<div data-role="collapsible-set" data-theme="a" data-content-theme="j" id="contentIpCam">
		<?php foreach ($rows_cameras as $f): ?> 
			<div data-role="collapsible" id="collapsible_<?=$f->cameras_id?>" >
				<h3><?=$f->cameras_descripcion?></h3>
				<div class="contentCamera">
					<img id="imgDisplay_<?=$f->cameras_id?>" alt="Im&aacute;gen de video no disponible" 
					src=""
					onclick="imageOnclick(this)"
					data-url="<?=$f->cameras_url?>:<?=$f->cameras_port?>/snapshot.cgi?user=<?=$f->cameras_user?>&pwd=<?=$f->cameras_password?>&next_url=tempsnapshot.jpg&count=" 
					onload="load_video('imgDisplay_<?=$f->cameras_id?>','<?=$f->cameras_url?>:<?=$f->cameras_port?>/snapshot.cgi?user=<?=$f->cameras_user?>&pwd=<?=$f->cameras_password?>&next_url=tempsnapshot.jpg&count=')"
					width="320" height="240">
					<?php foreach($rows_btncameras as $g):?>
						<?php if($g->cameras_id == $f->cameras_id): ?>
							<a href="#" data-role="button" name="<?=$g->btncameras_nombre?>" id="btn_actions" data-inline="true" data-theme="b"><?=$g->btncameras_label?></a>
						<?php endif; ?>
					<?php endforeach;?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div id="test"></div>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<style type="text/css">
.contentCamera{
	overflow: hidden;
	background-color: rgba(13, 33, 0, 0.3);
}
.contentCamera img{
	float:left;
}
#btn_actions{
	width:135px;
}
</style>

<script type="text/javascript"> 
	var count = 0;
	var xx = new Image();
	var paused = false;

	function body_onload(img_id,src_url){
		load_video(img_id,src_url);
	}	

	function reload_image(img_id,src_url){		
		xx.src = src_url + count ;	
		$("#"+img_id).attr("src",xx.src);
		count++;	
	}

	function load_video(img_id,src_url){    
		if (!paused) reload_image(img_id,src_url);	
		//setTimeout("reload_image()",100);
	}
	
	// Clicking on the image will pause the stream
    function imageOnclick(img) { 
        paused = !paused;
        if (!paused){
        	var id = $(img).attr("id");
        	var url = $(img).data('url');
        	load_video(id,url);
        }
    }

	
	$(document).ready(function(){
	    paused = true;
		$( "#contentIpCam div[id^=collapsible_]" ).live( "expand", function(event, ui) {
  			
			var coll  = $(this).attr("id");
			var img_id = $("#"+ coll +" img[id^=imgDisplay_]").attr('id');
			var src_url =  $("#"+img_id).data('url');
  			body_onload(img_id,src_url);

		});

		$( "#contentIpCam div[id^=collapsible_]" ).live( "collapse", function(event, ui) {
  			paused = false;
		});
	});

</script>