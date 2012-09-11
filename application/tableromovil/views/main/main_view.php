<?=$this->load->view('default/_header')?>
	<?php if($flag_novedades['r']): ?>
		<script type="text/javascript">
		 $(document).ready(function(){ 
		    	$.statusbar('createBar',{'url':'<?=base_url()?>novedades_controller/changeStateLeido/'});
		    	if(t) clearInterval(t);  
					var t = window.setInterval("updateNov('<?=base_url()?>novedades_controller/getNovJson/')",10000);
		 });
	 <?php endif; ?>
</script>
<div>
	<?=$this->basicauth->getMenu()?>
</div>

<?=$this->load->view('main/_footer_main')?>
