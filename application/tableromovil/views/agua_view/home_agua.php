<div class="ui-body ui-body-j">	
		<div data-role="collapsible" data-content-theme="c">
			<h3>Info</h3>
			<p>Para activar/desactivar las diferentes opciones, 
				deslice el botón On/Off.</p>
        </div>
		<div id="content_agua">
			<?=$this->load->view("agua_view/record_list_agua")?>
		</div>	
</div>
<script type="text/javascript"> 
	var t = setInterval("updateContent('<?=base_url()?>agua_controller/search_c/','content_agua')",1000);
</script>
