
<?php if(isset($novedades) && is_array($novedades) && count($novedades)>0):?>
	<?php foreach($novedades as $f):?>
		<p><?=$f->novedades_descripcion?></p>
	<?php endforeach; ?>
<?php else:?>
	No results!
<?php endif;?>