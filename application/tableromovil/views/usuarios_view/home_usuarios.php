<?=$this->load->view('default/_header')?>
<?php if($this->session->flashdata('flashConfirm')) echo "<script type='text/javascript'>showFlash('".$this->session->flashdata('flashConfirm')."',1)</script>";?>
<?php if($this->session->flashdata('flashError')) echo "<script type='text/javascript'>showFlash('".$this->session->flashdata('flashError')."',2)</script>";?>

<?php if($flag['i']):?>
	<a href="#" onClick="loadPage('<?=base_url()?>index.php/usuarios_controller/add_c','right-content')" id="icon-new" title='Nuevo'>Nuevo</a>
<?php endif; ?>
<div class="ui-body ui-body-c">
	<form action="<?=base_url()?>index.php/usuarios_controller/search_c" method="post" name="formSearchusuarios" id="formSearchusuarios">
		<label for="usuarios_username"><?=$this->config->item("usuarios_username")?>:</label>
    	<input type="search" name="usuarios_username" id="usuarios_username" />
		<input type="submit" name="btn-search" id="btn-search" value="Buscar" />
	</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#main-header h1").html("Usuarios");
    });
</script>

