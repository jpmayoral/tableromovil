<?php if(isset($rows_cameras) && is_array($rows_cameras) && count($rows_cameras) > 0): ?>
	<div data-role="collapsible-set" data-theme="a" data-content-theme="j" >
		<?php foreach ($rows_cameras as $f): ?> 
			<div data-role="collapsible" data-collapsed="false" >
				<h3><?=$f->cameras_descripcion?></h3>
				<div class="contentCamera">
					<img id="imgDisplay_<?=$f->cameras_id?>" alt="video" 
					src="<?=$f->cameras_url?>:<?=$f->cameras_port?>/shot.jpg" 
					onload="loadJsWindowed('<?=$f->cameras_url?>:<?=$f->cameras_port?>')"
					 width="320" height="240">
				</div>
			</div>
		<?php endforeach; ?>
	</div>

<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<style type="text/css">
.contentCamera{
	background-color: rgba(13, 33, 0, 0.3);
}
</style>

<script type="text/javascript"> 
	/*var count =0;
	var xx = new Image();

	function body_onload(){
		//load_video();
	}	
	function reload_image(id,url,port){		
		//var urlstring = "user="+ user +"&pwd="+ passwd +"&next_url=tempsnapshot.jpg&count=" + count ;	
		//xx.src = url + ":" +  port + "/shot.jpg?rnd="+Math.floor(Math.random()*1000000));
		src = url + ":" +  port + "/shot.jpg?rnd="+Math.floor(Math.random()*1000000);
		$("#"+id).attr('src',src);
		//imgDisplay.src = xx.src;			
		//count++;	
	}
	function load_video(id,url,port){    
		reload_image(id,url,port);	
		//setTimeout("reload_image()",100);
	}
	//window.onload = load_onload();

	*/

	//$(loadJsWindowed);


	var working = null;
	var showing = null;
	var rszOnAq = true;
	var switchAspect = false;

	function loadImage(url,e) {
	  var oldshowing = showing;
	  showing = working;
	  working = oldshowing;
	  showing.unbind()
	  showing.css("zIndex", 1);
	  if (rszOnAq)
	  {
	    rszOnAq = false;
	    onJsResize();
	  }
	  loadFeed(url);
	}

	function loadJsWindowed(url)
	{
	  rszOnAq = false;
	  initJsAq(url);
	}

	function initJsAq(url)
	{
	  working = $("#imgDisplay_1");
	  showing = $("#imgDisplay_1");
	  loadFeed(url);
	}

	function loadFeed(url) {
	  working.css("zIndex", -1);
	 // working.load(loadImage(url));
	  working.attr("src",url + "/shot.jpg?rnd="+Math.floor(Math.random()*1000000));
	}

	function onJsResize() {
	    if (showing == null)
	        return;
	    var width = $(window).width();
	    var height = $(window).height();
	    var paspect = (showing.width()+0.0)/showing.height();
	    var waspect = ($(window).width()+0.0)/$(window).height();
	    var aspectDep = (paspect > waspect)
	    var pic1 = $("#imgDisplay_1");
	    var pic2 = $("#imgDisplay_1");
	    if (switchAspect)
	        aspectDep = !aspectDep;
	    if (aspectDep)
	    {
	        pic1.css('width', width)
	        pic2.css('width', width)
	        pic1.css('height', '')
	        pic2.css('height', '')
	    }
	    else
	    {
	        pic1.css('height', height)
	        pic2.css('height', height)
	        pic1.css('width', '')
	        pic2.css('width', '')
	    }
	}


</script>