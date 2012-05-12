<div class="ui-body ui-body-j">	
		<!--<div data-role="collapsible" data-content-theme="c">
			<h3>Info</h3>
			<p>Para activar/desactivar las diferentes opciones, 
				deslice el botón On/Off.</p>
        </div>-->
		<div id="content_seguridad">
			<?=$this->load->view("seguridad_view/record_list_seguridad")?>
		</div>	
</div>
<script type="text/javascript"> 
	var t = setInterval("updateContent('<?=base_url()?>seguridad_controller/search_c/','content_seguridad')",1000);
</script>


