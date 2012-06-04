<?=$this->load->view('default/_header')?>
<?php if($this->session->flashdata('flashConfirm')) echo $this->session->flashdata('flashConfirm'); ?>
<?php if($this->session->flashdata('flashError')) echo $this->session->flashdata('flashError');?>

<?php if($flag['i']):?>
	<a href="<?=base_url()?>index.php/btncameras_controller/add_c/<?=$cameras_id?>" title='Nuevo'>Nuevo</a>
<?php endif; ?>
