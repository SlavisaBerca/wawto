$(document).on('change','#srch',function(){
    var set = $('#srch').val();
    if(set == '1')
    {
        $('#search-lg').attr('action','search-suppliers');
    }

    if(set == '2')
    {
        $('#search-lg').attr('action','search');
    }
    if(set == '3')
    {
        $('#search-lg').attr('action','request-search');
    }

    if(set =='')
    {
        $('#search-lg').attr('action','search')
    }
  
});