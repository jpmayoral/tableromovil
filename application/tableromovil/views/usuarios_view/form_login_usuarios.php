<form action="<?=base_url()?>welcome/login" method="post" name="formLoginusuarios" id="formLoginusuarios" data-ajax="false">
	<div data-role="fieldcontain">
		<label for="usuarios_username">Usuario:</label>
		<input type="text" name="usuarios_username" id="usuarios_username" value="" data-theme="b"/>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_password">Contraseña:</label>
		<input type="password" name="usuarios_password" id="usuarios_password" data-theme="b"/>
	</div>
	<input type="submit" name="Aceptar"  value="Aceptar" data-role="button" data-theme="a"/>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
</form>
