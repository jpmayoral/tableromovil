<ul data-role="listview" data-split-icon="gear" data-theme="a">
	<?php foreach($query as $q):?>
		<li><a href="#"><img src="<?php echo base_url("css/images/".$q->escenarios_iconpath)?>"><?php echo $q->escenarios_descripcion;?></a><a href="#"></a></li>
	<?php endforeach; ?>
</ul>


