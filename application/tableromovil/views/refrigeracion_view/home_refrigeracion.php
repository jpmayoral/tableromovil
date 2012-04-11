<?php ?> 

<div class="ui-body ui-body-c">	
		<div data-role="fieldcontain">
			<label for="aire_1_write">Aire n°1</label>
				<select name="aire_1_write" id="aire_1_write" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>		
				<select name="aire_1_read" id="aire_1_read" data-role="slider">
					<option value="desact">Desact.</option>
					<option value="act">Act.</option>				
				</select>											
		</div>	
		<div data-role="fieldcontain">
			<label for="temperatura_1">Temperatura:</label>
			<input type="range" name="temperatura_1" id="temperatura_1" value="24" min="17" max="100" data-highlight="true"/>
		</div>	
		<div data-role="fieldcontain">		
			<label for="aire_2_write">Aire n°2</label>
				<select name="aire_2_write" id="aire_2_write" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>
				<select name="aire_2_read" id="aire_2_read" data-role="slider">
					<option value="desact">Desact.</option>
					<option value="act">Act.</option>				
				</select>
		</div>	
		<div data-role="fieldcontain">
			<label for="temperatura_2">Temperatura:</label>
			<input type="range" name="temperatura_2" id="temperatura_2" value="24" min="17" max="100" data-highlight="true"/>
		</div>	
		<div data-role="fieldcontain">		
			<label for="aire_3_write">Aire n°3</label>
				<select name="aire_3_write" id="aire_3_write" data-role="slider" data-theme="b">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>
				<select name="aire_3_read" id="aire_3_read" data-role="slider">
					<option value="desact">Desact.</option>
					<option value="act">Act.</option>				
				</select>		
		</div>
		<div data-role="fieldcontain">
			<label for="temperatura_3">Temperatura:</label>
			<input type="range" name="temperatura_3" id="temperatura_3" value="24" min="17" max="100" data-highlight="true"/>
		</div>
		
</div>

