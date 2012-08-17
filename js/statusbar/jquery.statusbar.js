/**
 * jquery.statusbar v1.0
 * copyright 2011 Rob Stortelers (Merula Softworks) - www.merulasoft.nl
 */
(function($){  
	var slided = false ;
	var settings = {
				'message': 'Test',
				'argument': 'Test',
				'classStateNov':'btnStateNovCritico',
				'idNov':'',
				'url':''
			};
	var methods = {  
		init : function() {   
			
		    return this.each(function(){  
		    	
		   		if(options){  
	     			settings = $.extend(settings,options);  
	    		} 

		    	var data = $(this).data('statusbar');  
				if(!data){  
					data = $(this).data('statusbar','inicializado'); 
				}
		   		
		   		console.log(settings);
		   	});  
	  	  },
	  	createBar : function(options){
		  	  	//create the bar
				var statusbar = $("<div  data-role=\"footer\" data-position=\"fixed\" style=\"position:absolute; bottom:0px; left:0px; width:100%; z-index:5000; background-color:#F0F0F0; opacity:0.95; color:#333\" class=\"statusbar-wrapper\"><div style=\"height:35px;font-weight:normal;cursor:pointer;overflow:hidden; background-color:#474747;\" class=\"statusbar-header\"></div><div style=\"overflow:auto;\" class=\"statusbar-content\"></div></div>");
				$('#contentview').append(statusbar);
				//$('html').css("margin-top","26px");
				$('.statusbar-content').hide();
				var btnRemoveAll = $('<button style="margin:5px; color:#333;" data-role=\"none\" >Limpiar</button>').button().click(function(){
					removeAll(options.url);
				});
				btnRemoveAll.removeClass("ui-btn-hidden");
				$('.statusbar-content').append(btnRemoveAll);
				//$('.statusbar-header').hover(function(){$(this).toggleClass('ui-state-hover')});
				$('.statusbar-header').click(slide);
				
				//create text message area
				$('.statusbar-header').append("<div style=\"float:left;margin:5px;color:#fff;\" class=\"statusbar-header-text\">&nbsp;</div>");
	  	  },
		addMessage : function(options){
			$('.statusbar-header-text').clearQueue().show().css("opacity","").fadeOut(function()
			{
				$('.statusbar-header-text').text(options.message).fadeIn();
				addDetails(options.message,options.argument,options.classStateNov,options.idNov);
				
			});
		},
		removeElements: function(){
			$('.statusbar-content-item').remove();
			$('.statusbar-header-text').text('');
		}
	};

	$.statusbar = function( method ) {  
	  if (methods[method] ) {  
	   	return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));  
	  }else if ( typeof method === 'object' || ! method ) {  
	   	return methods.init.apply( this, arguments );  
	  }else {  
	   	$.error( 'Este método ' +  method + ' no existe en jQuery.statusbar' );  
	  }      
	};  

	function slide(){
  	  	if(!slided)
		{
			$('.statusbar-content').height($(window).height()-$('.statusbar-header').outerHeight()-($('.statusbar-content').outerHeight()-$('.statusbar-content').height()));
			$('.statusbar-content').slideDown();
		}else
		{
			//alert("viene b");	
			//$('.statusbar-content').height($(window).height()-$('.statusbar-header').outerHeight());
			$('.statusbar-content').slideUp();
		}
		slided = !slided;
	}

	function addDetails(message, argument, classStateNov, idNov){
		var item = $("<div style=\"margin:3px;padding:10px;cursor:pointer;\" class=\"statusbar-content-item\" id=\"" + idNov  + "\"></div>");
		item.hover(function(){$(this).toggleClass('ui-state-highlight')})
		//item.text(message);
		
		var txtDescripNov = $("<div class='txtDescripNov'></div>");
		txtDescripNov.text(message);

		var txtFechaNov = $("<p class='txtFechaNov'>"+argument+"</p>");
		txtDescripNov.append(txtFechaNov);

		item.append(txtDescripNov);

		/*var btnDelete = $('<button data-role=\"none\">Remove</button>');
		btnDelete.css('position','relative');
		btnDelete.css('float','left');
		btnDelete.button();
		btnDelete.removeClass("ui-btn-hidden");

		item.append(btnDelete);*/
		/*btnDelete.click(function(){
			item.remove();
		})*/
		//item.click(function(){options.onClick(argument)})

		var stateButton = $("<div id='btnStateNov'></div>");
		var txtStateNov = $("<div id='txtStateNov' class='"+ classStateNov +"'></div>");
		stateButton.append(txtStateNov);

		item.append(stateButton);
		$('.statusbar-content').append(item);
	}

	function removeAll(url){
		var elements='';
    	$.each($(".statusbar-content-item"), function() {
      		elements = elements +  $(this).attr('id') + ','; 
    	});
    	
    	if(elements != ''){
    		$.getJSON(url + encodeURIComponent(elements), function(data){
				if(data == 'ok'){
					$('.statusbar-content-item').remove();
					$('.statusbar-header-text').text('');
				}
    		});
    	}
		
	}

})(jQuery);  