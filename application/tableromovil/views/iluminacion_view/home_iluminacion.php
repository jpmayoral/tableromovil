<div class="ui-body ui-body-a">	
		<div data-role="collapsible" data-content-theme="c">
			<h3>Info</h3>
			<p>Para encender/apagar las diferentes luces, 
				deslice el botón On/Off.</p>
		</div>	
		<div id="content">
			<?=$this->load->view("iluminacion_view/record_list_iluminacion")?>
		</div>
</div>
<script type="text/javascript"> 
	var t = setInterval("updateContent('<?=base_url()?>iluminacion_controller/search_c/')",3000);
</script>
