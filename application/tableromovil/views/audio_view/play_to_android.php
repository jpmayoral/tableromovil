<script type="text/javascript">
	$(document).ready(function(){

		var audio = $(this).find('audio').get(0);
    var audiojs_android = $("#audiojs_android");
    var play = $(".play");
    var pause = $(".pause");
    var duration = $(".duration");

    $('#wrapper ol li').bind("vclick",function() {
      $(this).addClass('playing').siblings().removeClass('playing');
      playAudio($('a', this).attr('data-src'));
    });

    //cuando finaliza la pista de audio
    audio.addEventListener('ended', function () {
    	  var next = $('ol li.playing').next();
        if (!next.length) next = $('ol li').first();
        next.addClass('playing').siblings().removeClass('playing');
        playAudio($('a', next).attr('data-src'));
    }, false);


    // Cargar la primera pista
    first = $('#wrapper ol li a').attr('data-src');
    $('ol li').first().addClass('playing');
    playAudio(first);

    audio.addEventListener('play', function () {
        addClass(audiojs_android, 'playing');
        setVisibleCls(pause);
        setTimeout(function () { 
         setDuration(audio.duration);
        }, 5000);

    }, false);

    function setDuration(duration_seg)
    {
        m = Math.floor(duration_seg / 60),
        s = Math.floor(duration_seg % 60);
        duration.text(((m<10?'0':'')+m+':'+(s<10?'0':'')+s));
    }

    //reproducir audio
    function playAudio(src)
    {
        audio.src = src;
        audio.load();

        setTimeout(function () { 
          audio.play();
        }, 500);
    }

    $(play).click(function(){
        audio.play();
        setVisibleCls(pause);
        setInvisibleCls(play);
    });

    $(pause).click(function(){
        audio.pause();
        removeClass(audiojs_android, 'playing');
        setInvisibleCls(pause);
        setVisibleCls(play);
    });

	});
</script>

<div id="wrapper">
  <div class="audiojs_android" id="audiojs_android">
    <audio preload >Navegador no soporta Tipo de archivo de audio</audio>
    <div class="play-pause">
      <p class="play"></p>
      <p class="pause"></p>
    </div>
    <div class="scrubber"></div>
    <div class="time">
      <em class="played"></em>
      <strong class="duration"></strong>
    </div>
  </div>
  <ol>
  	<?php foreach($tracks as $key => $value): ?>
	    <li><a href="#" data-src="<?=base_url()."sounds/".$album."/".$value.".mp3"?>" ><?=$value?></a></li>
	<?php endforeach; ?>
  </ol>
</div>
