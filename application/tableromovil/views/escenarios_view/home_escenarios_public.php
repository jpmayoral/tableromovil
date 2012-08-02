<div id="content_escenariospublic">
	<?=$this->load->view("escenarios_view/record_list_escenarios_public")?>
</div>

<script type="text/javascript">
    $(document).ready(function(){ 
        $("#main-header h1").html("Escenarios");
        if(t) clearInterval(t);  
			var t = window.setInterval("updateContent('<?=base_url()?>escenariospublic_controller/search_c/','content_escenariospublic')",4000);
    });
</script>