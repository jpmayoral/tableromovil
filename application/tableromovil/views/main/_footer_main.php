
		<div class="logo-h">
			<!--<img src="<?=base_url()?>css/images/logo.png">-->
			<span class="logo">Domotech</span><br>
			<span class="slogan">Contr&oacute;la tu vida</span>
			
		</div>
	</div> <!-- end div content -->

</div> <!-- end div page -->

</body>
</html>
<style type="text/css">
.statusbar-content{
	color: #333;
	font-weight:bold;
}
</style>

<script type="text/javascript">
    $(document).ready(function(){ 
        
    	$.statusbar('createBar',{'url':'<?=base_url()?>novedades_controller/changeStateLeido/'});
  		if(t) clearInterval(t);  
			var t = window.setInterval("updateNov('<?=base_url()?>novedades_controller/getNovJson/')",7000);
    });

</script>