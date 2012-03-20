<?=$this->load->view('default/_header')?>
<?php if($this->session->flashdata('flashConfirm')) echo $this->session->flashdata('flashConfirm'); ?>
<?php if($this->session->flashdata('flashError')) echo $this->session->flashdata('flashError'); ?>
<div class="ui-body ui-body-c">
    <form action="<?=base_url()?>index.php/perfiles_controller/search_c" method="post" name="formSearchperfiles" id="formSearchperfiles">
    	<label for="perfiles_descripcion"><?=$this->config->item("perfiles_descripcion")?>:</label>
    	<input type="search" name="perfiles_descripcion" id="perfiles_descripcion" />
        <input type="submit" value="Buscar"/>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#main-header h1").html("Perfiles");
    });
</script>
