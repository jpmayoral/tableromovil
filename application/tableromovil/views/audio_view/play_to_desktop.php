<script type="text/javascript">
	$(document).ready(function(){
		
	 	var a = audiojs.createAll({
         trackEnded: function() {
            var next = $('ol li.playing').next();
            if (!next.length) next = $('ol li').first();
            next.addClass('playing').siblings().removeClass('playing');
            audio.load($('a', next).attr('data-src'));
            audio.play();
          }
        
        });
		
        // Load in the first track
        var audio = a[0];
        first = $('ol a').attr('data-src');
        $('ol li').first().addClass('playing');
        audio.load(first);

        // Load in a track on click
        $('ol li').click(function(e) {
          e.preventDefault();
          $(this).addClass('playing').siblings().removeClass('playing');
          audio.load($('a', this).attr('data-src'));
          audio.play();
        });


	});
</script>

<div id="wrapper">
  <audio preload></audio>
  <ol>
  	<?php foreach($tracks as $key => $value): ?>
	    <li><a href="#" data-src="<?=base_url()."sounds/".$album."/".$value.".mp3"?>"><?=$value?></a></li>
	<?php endforeach; ?>
  </ol>
</div>
