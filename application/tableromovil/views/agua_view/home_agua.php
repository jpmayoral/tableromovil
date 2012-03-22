<?php ?> 

<div class="ui-body ui-body-c">
	<form action="<?php base_url()?>index.php/" method="post">	
		<div data-role="fieldcontain">
			<label for="riego_write">Riego</label>
				<select name="riego_write" id="riego_write" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>		
				<select name="riego_read" id="riego_read" data-role="slider">
					<option value="desact">Desact.</option>
					<option value="act">Act.</option>				
				</select>											
		</div>
		<div id="mensaje"></div>
		
		<div data-role="fieldcontain">		
			<label for="piscina_write">Piscina</label>
				<select name="piscina_write" id="piscina_write" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>
				<select name="piscina_read" id="piscina_read" data-role="slider">
					<option value="desact">Desact.</option>
					<option value="act">Act.</option>				
				</select>
		</div>
		<div data-role="fieldcontain">		
			<label for="bomba_write">Bomba</label>
			<select name="bomba_write" id="bomba_write" data-role="slider" data-theme="b">
				<option value="off">Off</option>
				<option value="on">On</option>
			</select>
			<select name="bomba_read" id="bomba_read" data-role="slider">
					<option value="desact">Desact.</option>
					<option value="act">Act.</option>				
				</select>
		</div>
	</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#main-header h1").html("Agua");

    });

    $('#riego_write').change(function() {
    	//code     	
    	var valor = $('#riego_write').val();
    	if(valor == 'on')
    	{
    		//alert('encendido');
    		//$('#riego_read').val('act');
    		$('#mensaje').text('encendido');
    	}else{
    		$('#mensaje').text('apagado');
    	}
   	});  
</script>
