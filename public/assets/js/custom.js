$(document).ready(function(){

    $('#searchvalue').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/set/fetch",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    $('#setList').fadeIn();  
                    $('#setList').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        $('#searchvalue').val($(this).text());  
        $('#setList').fadeOut();  
    });  

});