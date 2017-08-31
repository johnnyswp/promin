$('.add-cart').on('click', function(event){
    event.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
    	url: '/add-cart/'+id,
    	type: 'POST',
    	dataType: 'html',
    })
    .done(function(html) { $('.hcart').html(html); $('#content-cart').css('display','block'); addEvent(); })
    .fail(function() { console.log("error"); })
    .always(function() { console.log("complete"); });
});

addEvent();

function addEvent(){
    $('.delete-cart').on('click', function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/delete-cart/'+id,
            type: 'POST',
            dataType: 'html',
        })
        .done(function(html) { $('.hcart').html(html); $('#content-cart').css('display','block'); addEvent(); })
        .fail(function() { console.log("error"); })
        .always(function() { console.log("complete"); });
    });
    
    $('.update-cart').on('change', function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        var val = $(this).val();
        $.ajax({
            url: '/update-cart/'+id+'/'+val,
            type: 'POST',
            dataType: 'html',
        })
        .done(function(html) { $('.hcart').html(html); $('#content-cart').css('display','block'); addEvent(); })
        .fail(function() { console.log("error"); })
        .always(function() { console.log("complete"); });
    });
}

