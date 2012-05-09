<div class="ui-body ui-body-i">	
		<div data-role="collapsible" data-content-theme="c">
			<h3>Info</h3>
			<p>Para encender/apagar las diferentes luces, 
				deslice el botón On/Off.</p>
		</div>	
		<div id="content_iluminacion">
			<?=$this->load->view("iluminacion_view/record_list_iluminacion")?>
		</div>
</div>
<script type="text/javascript"> 
	var t = setInterval("updateContent('<?=base_url()?>iluminacion_controller/search_c/','content_iluminacion')",1000);
</script>
