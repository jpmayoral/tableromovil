<?=$this->load->view('default/_header')?>
<?php if($this->session->flashdata('flashConfirm')) echo $this->session->flashdata('flashConfirm'); ?>
<?php if($this->session->flashdata('flashError')) echo $this->session->flashdata('flashError'); ?>

<div id="contentDivNovedades"></div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#main-header h1").html("Novedades");
        $("#contentDivNovedades").load("<?=base_url()?>novedades_controller/search_c/");
    });
</script>

