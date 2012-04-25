<?php ?> 

<div class="ui-body ui-body-c">	
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
