<?php if(isset($escenarios) && is_array($escenarios) && count($escenarios)>0):?>
	<ul data-role="listview" >
		<?php foreach($escenarios as $f):?>

			<li>
				<img src="<?=base_url()?>thumbs/escenarios/<?=$f->escenarios_iconpath?>" />
				<h3><?=$f->escenarios_descripcion?></h3>
				<p>
					<?php if($f->escenarios_estado == 0): ?>
						<div class="desactive" id="stateElem" onClick="changeState(this,'<?=base_url()?>escenarios_controller/changeState/<?=$f->escenarios_id?>/')">Desactivado</div>
					<?php else: ?>
						<div class="active" id="stateElem" onClick="changeState(this,'<?=base_url()?>escenarios_controller/changeState/<?=$f->escenarios_id?>/')">Activado</div>
					<?php endif; ?>
				</p>
			</li>

		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>No results!</p>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){

	$(".desactive,.active").mouseover(function(){
		$(this).css("cursor","default");
	});
});

function changeState(elem, url)
{
	if($(elem).html() == "Desactivado"){
		$.get(url + "1", function(data){
			if(data=="ok")
				$(elem).removeClass("desactive").html("Activado").addClass("active");
		});
	}else{
		$.get(url + "0", function(data){
			if(data=="ok")
				$(elem).removeClass("active").html("Desactivado").addClass("desactive");
		});
	}
}
</script>
