$(document).bind('pageinit', function(){
    $.mobile.defaultPageTransition = 'none';
    $.mobile.defaultDialogTransition = 'none';
    //$.mobile.ajaxEnabled = false;
    

    $('#btn_home').on({
      click: function() {
        if(t) clearInterval(t);  
      }
    });

});

$(document).bind("mobileinit", function(){
  $.mobile.page.prototype.options.addBackBtn = true;
  $.mobile.page.prototype.options.backBtnText = "Volver";
});


// function to send form through ajax
function submitData(idform,arr_divs_loader)
{    
    $("#"+idform).submit(function() 
    {
   	 $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data) {
        		$('#'+arr_divs_loader[0]).html(data);
        }
    	})        
    return false;
    });	
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
function setPaginationTwo(p_div_loader, p_form)
{    
     $("div.pagination a").click(function(e)
     {
            e.preventDefault();
            $.ajax({
            type: 'POST',
            url: $(this).attr("href"),
            data: $('#'+p_form).serialize(),
            success: function(data) {
            }
            });  
     });        
}

function setSwitch(value, url)
{
    var u;
    if(value == 'on') u = url + 1;
    else if(value == 'off') u = url + 0;

    $.get(u, function(data) {
        //alert(data);
    });    
}

function setBtnIpCam(value,salidad_id,url)
{
    var u = url + salidad_id + '/' + value;
    $.get(u, function(data) {
        //alert(data);
    });    
}    

function updateContent(url,div)
{
    $.get(url, function(data){
        //$("#content").html(data).page();
        //$( "div[data-role=page]" ).page("destroy").page();
        $('#'+div).html(data).trigger("pagecreate").trigger("refresh");
    });
}

function deleteRow(url)
{
    if(confirm("¿Estás seguro de eliminar este item?")){
        window.open(url,'_top');
    }

}


function loadPageChk(url)
{
    var tracks='';
    $.each($(".pistas:checked"), function() {
      //list.push($(this).val());
      tracks = tracks +  $(this).val() + ','; 
    });
    if(tracks.length > 0){ 
        var album = $("#album").val();
        window.location = url + encodeURIComponent(album) + "/"+ encodeURIComponent(tracks);          
    }else{
       // showAleatoryMessage('Selecciona al menos un registro!');
    }
}

function loadPageChkPlayList(url)
{
    var tracks=''; var playlist = '';
    $.each($(".pistas:checked"), function() {
      //list.push($(this).val());
      tracks = tracks +  $(this).val() + ',';
      var nameChk = $(this).attr("name").split('-');
      playlist = playlist + $("#in_playlist_" + nameChk[1]).val() + ',' 
    });
    if(tracks.length > 0){ 
        var playlist_id = $("#playlist_id").val();
        var nameplaylist = $("#nameplaylist").val();
        window.location = url + playlist_id +'/'+ encodeURIComponent(nameplaylist) + "/" + encodeURIComponent(playlist) + '/'+ encodeURIComponent(tracks);          
    }else{
       // showAleatoryMessage('Selecciona al menos un registro!');
    }
}

function checkSelectedSongs(url)
{
    var tracks='';
    $.each($(".pistas:checked"), function() {
      tracks = tracks +  $(this).val() + ','; 
    });
  
    var album = $("#album").val();
    $.mobile.changePage(url + encodeURIComponent(album) + '/' + encodeURIComponent(tracks),{
        type: 'get',
        role: 'dialog'
    });
    
}

function agregarSongsToLista(url)
{
    var tracks='';
    $.each($("input[name=tracksSelected]"), function() {
      tracks = tracks +  $(this).val() + ','; 
    });
    if(tracks.length > 0){ 
       
        var str_url = url + encodeURIComponent(tracks);
        $.mobile.changePage(str_url,{
                type: 'get',
                role: 'dialog'
        });
    }
}

function crearLista(url)
{
    var tracks='';
    $.each($("input[name=tracksSelected]"), function() {
      tracks = tracks +  $(this).val() + ','; 
    });
    if(tracks.length > 0){ 
        var descripcion = $("#playlist_descripcion").val();
        if(descripcion.length > 0){
            var str_url = url + encodeURIComponent(tracks) + "/" + encodeURIComponent(descripcion);          
            $.mobile.changePage(str_url,{
                type: 'get',
                role: 'dialog'
            });
        }else{
            $("#msjValid").text("Debes ingresar un nombre para la lista de reproducción.");
        }   
    }
}


function showFormNewPlayList(url)
{
    var tracksSelected='';
    $.each($("input[name=tracksSelected]"), function() {
      tracksSelected = tracksSelected +  $(this).val() + ','; 
    });

    $.mobile.changePage(url + encodeURIComponent(tracksSelected),{
        type: 'get',
        role: 'dialog'
    });
}


function showAlbunes(url){
    
    $.mobile.changePage(url,{
        type: 'get'
    });
}


function updateNov(url)
{  
   $.getJSON(url, function(data) {
        if(data){
            $.statusbar('removeElements');
            $.each(data, function(key, val) {
               if(val.novedades_tipo == 0)
                 $.statusbar('addMessage',{'message':val.novedades_descripcion + " " +  val.novedades_estado_descripcion,'argument':val.novedades_fechaexacta,'classStateNov':'btnStateNovCritico','idNov': val.novedades_id});
               if(val.novedades_tipo == 1)
                 $.statusbar('addMessage',{'message':val.novedades_descripcion + " " +  val.novedades_estado_descripcion,'argument':val.novedades_fechaexacta,'classStateNov':'btnStateNovAlerta','idNov': val.novedades_id });
               if(val.novedades_tipo == 2)
                 $.statusbar('addMessage',{'message':val.novedades_descripcion + " " +  val.novedades_estado_descripcion,'argument':val.novedades_fechaexacta,'classStateNov':'btnStateNovInfo','idNov': val.novedades_id });
            });
        }
    });
}


//function to play in Android

function addClass(ele,cls) {
  ele.addClass(cls);
}

function removeClass(ele,cls) {
  ele.removeClass(cls);
}

function setVisibleCls(ele){
  ele.css("display","block");
}

function setInvisibleCls(ele){
  ele.css("display","none");
}

