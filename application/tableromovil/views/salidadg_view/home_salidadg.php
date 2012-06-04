<div class="ui-body ui-body-j">	
		<div id="content_salidadg">
			<?=$this->load->view("salidadg_view/record_list_salidadg")?>
		</div>
</div>
<script type="text/javascript"> 
	var t = setInterval("updateContent('<?=base_url()?>salidadg_controller/search_c/<?=$sismenu_id?>','content_salidadg')",1000);
</script>
