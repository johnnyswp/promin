$('.add-cart').on('click', function(event){
    event.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
    	url: '/add-cart/'+id,
    	type: 'POST',
    	dataType: 'html',
    })
    .done(function(html) { 
        if(html=="0"){
            promin.m('danger','No hay mas axistencias de este producto');
            return false;
        }
        $('.hcart').html(html); $('#content-cart').css('display','block'); addEvent(); })
    .fail(function() { console.log("error"); })
    .always(function() { console.log("complete"); });
});

$('.update').on('click', function(event){
    event.preventDefault();

    var id  = $(this).attr('data-id');
    var val = parseInt($('#input-cart-'+id).val());
    var mode = $(this).attr('data-mode');
    if(mode=='remove'){ val=val-1; }else{ val=val+1; }
    $.ajax({
        url: '/update-one-cart/'+id+'/'+val+'/'+mode,
        type: 'POST',
        dataType: 'json',
    })
    .done(function(json) { if(json.error=='1'){ promin.m('danger','No hay mas existencias de este producto'); } if(json.error=='4'){ promin.m('danger','No tienes productos en el carrito'); } $('#input-cart-'+id).val(json.qty); $('.hcart').html(json.html); $('#content-cart').css('display','block'); addEvent(); })
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
            dataType: 'json',
        })
        .done(function(json) { if(json.error=='1'){ promin.m('danger','No hay mas axistencias de este producto'); } $('#input-cart-'+json.id).val(json.qty); $('.hcart').html(json.html); $('#content-cart').css('display','block'); addEvent(); })
        .fail(function() { console.log("error"); })
        .always(function() { console.log("complete"); });
    });
}

