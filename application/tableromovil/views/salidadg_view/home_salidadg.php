<div class="ui-body ui-body-j">	
		<div id="content_salidadg">
			<?=$this->load->view("salidadg_view/record_list_salidadg")?>
		</div>
</div>
<script type="text/javascript"> 
	if(t) clearInterval(t); 
	var t = setInterval("updateContent('<?=base_url()?>salidadg_controller/search_c/<?=$sismenu_id?>','content_salidadg')",3000);
</script>
