<div class="ui-body ui-body-j">	
		<div id="content_entradadg">
			<?=$this->load->view("entradadg_view/record_list_entradadg")?>
		</div>
</div>
<script type="text/javascript"> 
	var t = setInterval("updateContent('<?=base_url()?>entradadg_controller/search_c/<?=$sismenu_id?>','content_entradadg')",1000);
</script>
