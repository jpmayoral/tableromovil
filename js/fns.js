
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