// Functon to Show out Busy Div and Hide Busy Div
function showBusy(p_div_show, p_div_hide)
{	
	$('#'+p_div_hide).fadeOut('fast', function(){
		$('#'+p_div_show).fadeIn('fast');
	});
}

// Functon to Hide out Busy Div and display Errors Div
function hideBusy(p_div_show, p_div_hide)
{
	$('#'+p_div_hide).fadeOut('fast',function(){
			$('#'+p_div_show).fadeIn('slow');
	});
}

// function to process form response
function processForm(data, arr_divs_loader)
{		
		window.setTimeout( function(){
			hideBusy('errors','busy');
			//si en la variable data no existe la cadena required cargamos el contenido en un div determinado
			//si existe la cadena required cargamos el cotenido en otro div
		 	if(data.indexOf('field') == -1){
		 		$('#'+ arr_divs_loader[0]).html(data);
		 	}else{
		 		$('#'+ arr_divs_loader[1]).html(data);
		 	}
	 	}, 200);	
}


// function to send form through ajax
function submitData(idform,arr_divs_loader)
{    
    $("#"+idform).submit(function() 
    {
   	 $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        beforeSend: function(){
				showBusy('busy','errors');
		  },	
        success: function(data) {
        		processForm(data,arr_divs_loader);
        }
    	})        
    return false;
    });	
}

// function to send form through ajax
function submitData2(idform,arr_divs_loader)
{    
	 $.ajax({
     type: 'POST',
     url: $("#"+idform).attr('action'),
     data: $("#"+idform).serialize(),
     beforeSend: function(){
			showBusy('busy','errors');
	  },	
     success: function(data) {
     		processForm(data,arr_divs_loader);
     }
 	 })        
}

// function to load content through ajax
function loadPage(url,div_loader)
{	
	showFlash('Cargando...',5);
	$('#'+div_loader).load(url, function(){
			$.alert.closeLoading('Listo...',1);
	}).fadeIn('slow');		
}

// function to load form edit through ajax
function loadPageEdit(url,div_loader)
{	
	if($('#id123').val())
	{
		showFlash('Cargando...',5);
		url=url+$('#id123').val();
		$('#'+div_loader).load(url, function(){
				//$("#loading").css("display", "none");
				$.alert.closeLoading('Listo...',1);
		}).fadeIn('slow');
	}else{
		showAleatoryMessage('Por favor selecciona un registro!')
	}	
}

// function to delete a set of row of the table
function loadPageDelete(url, div_loader, text)
{	
	var list = new Array();
	$.each($("input[name='chkLote']:checked"), function() {
      list.push($(this).val());
   });
	if(list.length>0){
		if(!text) text = "¿Estas seguro de eliminar los items seleccionados?";
		jConfirm(text, 'Mensaje de confirmación', function(r) {
			if (r) {
				
				$.post(url,{arrkeys:list}, function(data) {
		  			$('#'+div_loader).html(data).fadeIn('slow');
				});
			}	
		});
	}else{
		showAleatoryMessage('Selecciona un registro!');
	}
}

// function to delete a set of row of the table
function loadPageChk(url, div_loader, text, nameChk)
{	
	var list = new Array();
	$.each($("input[name="+nameChk+"]:checked"), function() {
      list.push($(this).val());
   });
	if(list.length>0){				
		$.post(url,{arrkeys:list}, function(data) {
  			$('#'+div_loader).html(data).fadeIn('slow');
		});	
	}else{
		showAleatoryMessage('Selecciona al menos un registro!');
	}
}

// function to delete a row of the table
function deleteData(url, div_loader, text)
{
	jConfirm(text, 'Mensaje de confirmación', function(r) {
		if (r) {
			$.post(url, function(data) {
	  			$('#'+div_loader).html(data).fadeIn('slow');
			});
		}	
	});
}

// function to show a aleatory messege in a box
function showAleatoryMessage(text)
{	
	jAlert(text, 'Mensaje de Alerta');	
}

// function to show flash messages
function showFlash(msg,flag)
{
    switch(flag){
    	
    	case 1:	
    		$.alert(msg);
    		break;
    		
    	case 2:
    		 $.alert(msg,{
    			width:400,
    			height:30,
    			nameClass:'flash-error',
    			nameId:'flash-error',
    			time: 1500	
			  });
    		break;
    		
    	case 3:
    		$.alert(msg,{
    			width:400,
    			height:30,
    			nameClass:'flash-alert',
    			nameId:'flash-alert',
    			time: 1500	
			});
    		break;
    		
    	case 4:
    		$.alert(msg,{
    			width:400,
    			height:30,
    			nameClass:'flash-info',
    			nameId:'flash-info',
    			time: 1500	
			});
    		break;
    	
    	case 5:
    		$.alert(msg,{
    			width:400,
    			height:30,
    			nameClass:'flash-loading',
    			nameId:'flash-loading',
    			time: 1500,
    			permanent:1	
			});
    		break;	
    	
    	case 6:
    		$.alert(msg,{
    			width:400,
    			height:30,
    			nameClass:'flash-loading',
    			nameId:'flash-loading',
    			time: 1,
    			permanent:0	
			});
    		break;
    			
    	default:
    		break;
    };
}

// function to show data's pagination
function setPagination(url, div_loader)
{	 
	 $("div.pagination a").click(function(e){
    	// stop normal link click
    	e.preventDefault();
    	$('#'+div_loader).load(url+$(this).attr("href"));
  	 });
}


// function to show data's pagination
function setPaginationTwo(p_url, p_div_loader, p_form)
{	 
	 $("div.pagination a").click(function(e)
	 {
	    	// stop normal link click
	    	e.preventDefault();
	    	//$('#'+div_loader).load(url+$(this).attr("href"));
	    	$.ajax({
	        type: 'POST',
	        url: p_url+$(this).attr("href"),
	        data: $('#'+p_form).serialize(),
	        success: function(data) {
	        		$('#'+p_div_loader).html(data);
	        }
	    	})  
  	 });      	
}

function showBoxImageUser(id_a,url)
{
	$("#"+id_a).colorbox({
				href:url,
				width:"50%", 
				height:"50%", 
				iframe:true,
				transition:"none",
				opacity:0.8,
				close:"Cerrar"
	});	
}


//show the datapicker in the fields of form
function setDatePicker(arr_fields)
{
	for(var i=0; i<arr_fields.length; i++)
	{
		$( "#"+arr_fields[i]).datepicker({
			autoSize: true,
			gotoCurrent:true,
			changeYear: true,
			changeMonth: true,
			closeText: 'X'
		});	
	}
}

//show the datapicker in the fields of form and  it only allow selects present or future dates
function setDatePickerTwo(arr_fields)
{
	for(var i=0; i<arr_fields.length; i++)
	{
		$( "#"+arr_fields[i]).datepicker({
			autoSize: true,
			gotoCurrent:true,
			changeYear: true,
			changeMonth: true,
			minDate: new Date(),
			closeText: 'X'
		});	
	}
}

//show the results of the upload of files
function resultUpload(estado, url, nameFile) 
{	
	if (estado == 0)
	{
		var mensaje = "El Archivo "+ nameFile +" se ha subido correctamente al servidor";
		$("#linkContinue").attr("onClick","loadPage('"+url+"','result-list-detail')");
		$("#btnContinue").removeAttr('disabled');
	}
	if (estado == 1)
	{
		var mensaje = "Error ! - Error al cargar el archivo "+nameFile+" <br><a href='#' onClick=\"loadPage('"+url+"','right-content')\"> Intentar de nuevo</a>";
	}
	
	$("#formUpload").html(mensaje);

}

// function to add items to a select
function addItemToSelect(options2, options1)
{
	var arr_items_id = "";
	arr_items_id = $("#"+options2.idSelectNoAssing).val() || [];
	/*$("#valores").html(" <b>Seleccion actual:</b> " + 
                  arr_sismenu_id.join(", "));
   */
   if($('#'+options1.mainSelect).val() != "0"){
	   if(arr_items_id !=  "") { 
	   
		   $.post(options2.url_set,{'id':$('#'+options1.mainSelect).val(),'arr_items_id':arr_items_id}, function(data){		
				 if(data[0]['estado'] == true){
				 		getAllItems(options1);
				 }else{
				 	alert('Imposible realizar la operación');
				 }	 	  
			 },"json");
			 
		 }else{
		 	alert('Debes seleccionar alguna opción');	
		 }
	}else{
		alert("Debes seleccionar "+options2.msg);	
	}
}

// function to quit items of a select
function quitItemToSelect(options3, options1)
{	
	var arr_items_id = "";
	arr_items_id = $("#"+options3.idSelectNoAssing).val() || [];
	
	/*$("#valores").html(" <b>Multiple:</b> " + 
                  arr_sismenu_id.join(", "));
   */
   
   if($('#'+options1.mainSelect).val() != "0"){
	   if(arr_items_id !=  "") { 
	
		   $.post(options3.url_quit,{'id':$('#'+options1.mainSelect).val(),'arr_items_id':arr_items_id }, function(data){		
				 if(data[0]['estado'] == true){
				 	getAllItems(options1);			
				 }	  
			 },"json");
			 
		 }else{
		 	alert('Debes seleccionar alguna opción de menu');	
		 }
	}else{
		alert("Debes seleccionar "+options2.msg);	
	}
}

// function to get all items and put them in a select
function getAllItems(options) 
{
    $.post(options.url,{id:$('#'+options.mainSelect).val()}, function(data){
		
		  var toAppend1 = "";
		  var toAppend2 = "";
		
		  $.each(data,function(i,item){ 
		  		if(item.elemento['cod']==1){
		  			toAppend1 += '<option value = \"' + item.elemento[options.fieldId] + '\">' + item.elemento[options.fieldDescription] + '</option>';
		  		} else {
		  			toAppend2 += '<option value = \"' + item.elemento[options.fieldId] + '\">' + item.elemento[options.fieldDescription] + '</option>';
		  		}
		  });
		  		 
		  $("#"+options.idSelectAssing).empty();
		  $("#"+options.idSelectAssing).html(toAppend1);
		  $("#"+options.idSelectNoAssing).empty();
		  $("#"+options.idSelectNoAssing).html(toAppend2);
		  
	 }, "json");

}

//function to put a tab 
function getTabs(id)
{
	$( "#"+id).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. ");
				}
			}
	});	
}


function getHoverTable(id,url,result)
{	
	$("#"+id+" tr").click(function()
	{
		var obj = $(this);
		$.post(url,{ param:obj.attr('id')}, function(reponse){
 			$("#"+id).find('tr').removeClass('hover');
 			obj.addClass('hover');
 			
 			$("#"+result).html(reponse);
 		});	
	});	
}

function getHoverTableTwo(p_table_id, p_num_row)
{	
	$("#"+p_table_id+" tbody tr").click(function(){
		var obj = $(this);
 		$("#"+p_table_id).find('tr').removeClass('hover');
 		obj.addClass('hover');
 		if(!p_num_row) $('#id123').val(obj.find("td").eq(1).html());
 		else $('#id123').val(obj.find("td").eq(p_num_row).html());
	});	
}

//function to get a window modal
function getModalWindow(p_url,p_title,p_width,p_height)
{
	$.modal('',{
 		width:p_width,
 		height:p_height,
 		nameClass:'modal-window',
 		nameId:'modal-window',
 		title:p_title,
 		url:p_url	
	});	
}

//function to get a window modal
function getModalWindowAdvancedOne(p_url,p_title,p_width,p_height,nameChk)
{
	var list = new Array();
	$.each($("input[name="+nameChk+"]:checked"), function() {
      list.push($(this).val());
   });
	if(list.length>0){					
		$.modal('',{
 			width:p_width,
 			height:p_height,
 			nameClass:'modal-window',
 			nameId:'modal-window',
 			title:p_title,
 			url:p_url + list	
		});
	}else{
		showAleatoryMessage('Selecciona al menos un registro!');
	}	
}

//function to close of window modal
function closeModalWindows()
{
	$.modal.close();	
}

//function to autocomplete a field
function autocomplete(p_idfield, p_url, p_model, p_idExtraParam, p_arrFieldsToShow)
{
	$("#"+p_idfield).autocomplete(p_url, {
		width: 300,
		//multiple: true,
		matchContains: true,
		autoFill: true,
		selectFirst: true,
		delay: 0,
		extraParams: {
				valExtraParam: function(){
					 if($('#'+p_idExtraParam).val()) return $('#'+p_idExtraParam).val();
					 else return 'NO';
				},
				nameExtraParam:function(){ return $('#'+p_idExtraParam).attr('id') },
				model: p_model,
				nameFieldToSearch: function(){ return $('#'+p_idfield).attr('id') },
				arrFieldToShow: function(){ return serialize(p_arrFieldsToShow) }
		}
		/*formatItem: function(item) {
			return format(item);
		}*/
	}).result(function(e, item) {
		for(var i=0; i< p_arrFieldsToShow.length; i++)
		{
			$("#"+p_arrFieldsToShow[i]).val(item[i+1]);
		}
	});		
}


//function to autocomplete a field
function autocompleteTwo(p_idfield, p_url, p_model, p_idExtraParam, p_arrFieldsToShow, p_fieldToSearch)
{
	$("#"+p_idfield).autocomplete(p_url, {
		width: 300,
		//multiple: true,
		matchContains: true,
		autoFill: true,
		selectFirst: true,
		delay: 0,
		extraParams: {
				valExtraParam: function(){
					 if($('#'+p_idExtraParam).val()) return $('#'+p_idExtraParam).val();
					 else return 'NO';
				},
				nameExtraParam:function(){ return $('#'+p_idExtraParam).attr('id') },
				model: p_model,
				nameFieldToSearch: p_fieldToSearch,
				arrFieldToShow: function(){ return serialize(p_arrFieldsToShow) }
		}
		/*formatItem: function(item) {
			return format(item);
		}*/
	}).result(function(e, item) {
		for(var i=0; i< p_arrFieldsToShow.length; i++)
		{
			$("#"+p_arrFieldsToShow[i]).val(item[i+1]);
		}
	});		
}


//function to format the returned values of the autocomplete
function format(item) 
{
		//return provincia.provincias_nombre + " &lt;" + provincia.provincias_id + "&gt";
}

//function to serialize an array of values to send by 'post' method
function serialize(arr)
{
     var res = 'a:'+arr.length+':{';
     for(i=0; i<arr.length; i++)
     {
         res += 'i:'+i+';s:'+arr[i].length+':"'+arr[i]+'";';
     }
     res += '}';
      
     return res;
}

//function to activate flash messages 
function activarFlashRegisterUser(p_div_to_active)
{
	$("#"+p_div_to_active).css('display','block');	
}

//function to select a set of checkboxs
function selectAllChks(p_chk1,p_chk2)
{
	$("input[name="+p_chk1+"]").change(function(){
		$("input[name="+p_chk2+"]").each( function() {			
			if($("input[name="+p_chk1+"]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
}

function getPrecio(cat,i){
	var cl_cat = $("#"+cat).val();
	if(cl_cat == 3) 
	{ 
		$("#articulos_precio-"+i).attr('id','articulos_precio1-'+i);
		$("#articulos_precio1-"+i).attr('name','articulos_precio1-'+i); 
		return 'articulos_precio1-'+i; }
	else if(cl_cat == 4) 
	{
	 	$("#articulos_precio-"+i).attr('id','articulos_precio2-'+i); 
	 	$("#articulos_precio2-"+i).attr('name','articulos_precio2-'+i); 
	 	return 'articulos_precio2-'+i; }
	else 
	{ 
		$("#articulos_precio-"+i).attr('id','articulos_precio3-'+i); 
		$("#articulos_precio-"+i).attr('name','articulos_precio3-'+i); 
		return 'articulos_precio3-'+i; 
	}
}

function getSubtotal(cat,i)
{
	var cl_cat = $("#"+cat).val();
	if(cl_cat == 3){
		$("#pedidodetalle_subtotal-"+i).val($("#articulos_precio1-"+i).val()*$("#pedidodetalle_cantidad-"+i).val());
		getTotal();	
	}else if(cl_cat == 4){
		$("#pedidodetalle_subtotal-"+i).val($("#articulos_precio2-"+i).val()*$("#pedidodetalle_cantidad-"+i).val());
		getTotal()
	}else{
		$("#pedidodetalle_subtotal-"+i).val($("#articulos_precio3-"+i).val()*$("#pedidodetalle_cantidad-"+i).val());
		getTotal()
	}
	
}

function getTotal()
{
	var total=0;
	$("#lineascampos input[name^=pedidodetalle_subtotal-]").each(function(i,v){
		if($(v).val() != '') total = parseFloat(total) + parseFloat($(v).val());
	});
	$("#peididos_montototal").val(total);
}

// function to load content through ajax
function getR(elem,url)
{	
	//alert($(elem).attr('id'));
	url = url + $(elem).val();
	$.get(url, function(data){
		var flag = false;
		$("select[name=marcas_id]").each(function(i,v){
			if($(elem).val() == $(v).val()){
				flag = true;
			} else if(flag) $(v).remove();
		});	
		$("select[name=marcas_id]").each(function(i,v){
			if($(elem).val() == $(v).val()){
				$(data).insertAfter(elem);
			}
		});	
	});

	//$('#'+div_loader).load(url);
}
