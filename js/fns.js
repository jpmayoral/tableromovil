
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