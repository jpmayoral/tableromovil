<form action="<?=base_url()?>welcome/login" method="post" name="formLoginusuarios" id="formLoginusuarios">
	<div data-role="fieldcontain">
		<label for="usuarios_username">Usuario:</label>
		<input type="text" name="usuarios_username" id="usuarios_username" value="" autofocus="autofocus"/>
	</div>
	<div data-role="fieldcontain">
		<label for="usuarios_password">Contraseña:</label>
		<input type="password" name="usuarios_password" id="usuarios_password" />
	</div>
	<input type="submit" name="Aceptar"  value="Aceptar" data-role="button" data-theme="b"/>
	<div class="errors" id="errors">
	<?php
		echo validation_errors();
		if(isset($error)) echo $error;
	?>
	</div>
</form>
