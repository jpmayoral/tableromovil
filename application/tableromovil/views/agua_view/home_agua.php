<?php ?> 

<div class="ui-body ui-body-a">	
		<div data-role="collapsible" data-content-theme="c">
			<h3>Info</h3>
			<p>Para activar/desactivar las diferentes opciones, 
				deslice el botón On/Off.</p>
		</div>	
		<!--<div data-role="fieldcontain">			
			<label for="cantidad_riego">Cantidad de Riego: </label>
			<input type="range" name="cantidad_riego" id="cantidad_riego" value="1" min="0" max="5"/>
		</div>-->
		<div data-role="fieldcontain">
			<label for="riego">Riego</label>
				<select name="riego" id="riego" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>													
		</div>
		<div id="mensaje"></div>		
		<div data-role="fieldcontain">		
			<label for="piscina">Piscina</label>
				<select name="piscina" id="piscina" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>				
		</div>
		<div data-role="fieldcontain">		
			<label for="bomba">Bomba</label>
			<select name="bomba" id="bomba" data-role="slider" data-theme="b">
				<option value="off">Off</option>
				<option value="on">On</option>
			</select>			
		</div>		
</div>



<script type="text/javascript">

    $('#riego').change(function() {
    	//code     	
    	var valor = $('#riego').val();
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
