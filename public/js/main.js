$(document).ready(function(){
    $('#ajax').on('click', function(){
        var number = parseFloat($('#number').val());
        var data = {number: number};
        if(number != null){
            $.ajax({
                url: $(this).attr('url'),
                type: "POST",
                data: data,
                success: function(data){
                    $('#square').val(data);
                }
            })
        }
    });
    $('#transport-load').on('click', function(){
        $(this).toggleClass('hidden');
        $('#transport-form').toggleClass('hidden');
    });



});