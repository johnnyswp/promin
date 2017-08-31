$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var admin = {
    previewImg: function() {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    },
    showMgs: function() {
        $('.msj_success').removeClass('hide');
        setTimeout(function() {
            $('.msj_success').addClass('hide');
        }, 2000);
    },
    showCPS: function() {
        var cps = $('input[name=cp]');

        var colonia = $('input[name=colonia]');
        var municipio = $('input[name=municipio]');
        var estado = $('input[name=estado]');
        var ciudad = $('input[name=ciudad]');
        var pais = $('input[name=pais]');

        //        cps.on('blur', function() {
        var val = cps.val();

        $.ajax({
            method: "GET",
            type: 'json',
            url: "/cps/" + val,
            success: function(data) {
                console.log(data);
                colonia.val(data.colonia);
                municipio.val(data.municipio);
                estado.val(data.estado);
                ciudad.val(data.ciudad);
                pais.val('Mexico');
            },
            error: function(data) {
                console.log("error");
                // Log in the console
                var errors = data.responseJSON;
                console.log(errors);
                var errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul></di>';
                $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  
            }
        });
        //      });
    },
    showCPS2: function() {
        var cps = $('input[name=cp_2]');

        var colonia = $('input[name=colonia_2]');
        var municipio = $('input[name=municipio_2]');
        var estado = $('input[name=estado_2]');
        var ciudad = $('input[name=ciudad_2]');
        var pais = $('input[name=pais_2]');

        //        cps.on('blur', function() {
        var val = cps.val();

        $.ajax({
            method: "GET",
            type: 'json',
            url: "/cps/" + val,
            success: function(data) {
                console.log(data);
                colonia.val(data.colonia);
                municipio.val(data.municipio);
                estado.val(data.estado);
                ciudad.val(data.ciudad);
                pais.val('Mexico');
            },
            error: function(data) {
                console.log("error");
                // Log in the console
                var errors = data.responseJSON;
                console.log(errors);
                var errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul></di>';
                $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  
            }
        });
        //      });
    }
}

$(document).ready(function() {
    $('.preview').on('change', function() {
        admin.previewImg();
    });

    $('input[name=cp]').on('blur', function(event) {
        event.preventDefault();
        admin.showCPS();
    });
    $('input[name=cp_2]').on('blur', function(event) {
        event.preventDefault();
        admin.showCPS2();
    });

});