<?=$this->load->view('default/_header')?>
<?php if($this->session->flashdata('flashConfirm')) echo $this->session->flashdata('flashConfirm'); ?>
<?php if($this->session->flashdata('flashError')) echo $this->session->flashdata('flashError'); ?>
<?php if($flag['i']):?>
	<a href="<?=base_url()?>escenarios_controller/add_c" title='Nuevo'>Nuevo</a>
<?php endif; ?>
<br><br>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#main-header h1").html("Escenarios");
    });
</script>


