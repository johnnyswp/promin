$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

var promin = {

    firstName: "John",

    lastName: "Doe",

    register: function() {

        console.log("Promin.Register")

        var email = $('#email_register').val();

        var pass = $('#pass').val();

        var names = $('#names').val();

        if (!$('#aviso').prop("checked")) {

            alert("Debe aceptar el Aviso de Privacidad y los Términos y Condiciones de Uso.");

            return false;

        }

        $.ajax({

            method: "POST",

            url: "/register",

            data: {

                email: email,

                password: pass,

                name: names

            },

            success: function(data) {

               window.location.href = "/mi-cuenta";

            },

            error: function(data) {

                console.log("error");

                // Log in the console

                var errors = data.responseJSON;

                if(errors.suscrito){
                    console.clear();
                    console.log('suscrito',errors);
                    var html = '<div class="alert alert-danger"><ul><li></li></ul></div>;'
                    return false;
                }


                var errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors, function(key, value) {

                    errorsHtml += '<li>' + value + '</li>';

                });

                errorsHtml += '</ul></di>';

                $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  

            }

        });

    },

    login: function() {

        console.log("Promin.Login")

        var email = $('#email_login').val();

        var pass = $('#login-password').val();
        
        var pro = $('#url').attr('producto');

        $.ajax({

            method: "POST",

            url: "/login",

            data: {

                email: email,

                password: pass,

                pro: pro

            },

            success: function(data) {

                console.log("success login redirect");
                
                window.location.href = "/mi-cuenta";

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

                errorsHtml += '</ul></div>';

                $('#form-errors-login').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  

            }

        });

    },

    edit_profile: function() {

        console.log("Promin.edit_profile");

        var picture = $('#picture').val();

        var name = $('#name').val();

        var last_name = $('#last_name').val();

        var telephone = $('#telephone').val();

        var password = $('#password').val();

        var password_2 = $('#password_2').val();



        if (password == password_2) {



        } else {

            alert("La contraseña debe ser iguales.");

            return false;

        }





        $.ajax({

            method: "POST",

            url: "/update/edit_profile",

            data: {

                name: name,

                last_name: last_name,

                password: password,

                password_2: password_2,

                telephone: telephone,

                picture: picture

            },

            success: function(data) {

                console.log("success");

                $('.msj_success').removeClass('hide');

                setTimeout(function() {

                    $('.msj_success').addClass('hide');

                }, 1000);

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

                $('#form-errors-edir-perfil').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            }

        });

    },

    readURL: function(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();



            reader.onload = function(e) {

                $('#profileImg').attr('src', e.target.result);

                $("#picture").val(e.target.result);



            };



            reader.readAsDataURL(input.files[0]);

        }

    },

    showMgs: function() {



        setTimeout(function() {

            $('.msj_success').addClass('hide');

        }, 4000);

    },
    m: function(tipo, mgs) {

        $('#m').removeClass('hide');

        if (tipo == "danger") {
            $('#m').addClass('red').find('i').addClass('fa-times').parent().find('b').text(mgs);
        }
        if (tipo == "success") {
            $('#m').find('i').addClass('fa-check').parent().find('b').text(mgs);
        }
        if (tipo == "info") {
            $('#m').addClass('blue').find('i').addClass('fa-info').parent().find('b').text(mgs);
        }

        setTimeout(function() {
            $('#m').addClass('hide');
            if (tipo == "danger") {
                $('#m').removeClass('red').find('i').removeClass('fa-times').parent().find('b').text('');
            }
            if (tipo == "success") {
                $('#m').find('i').removeClass('fa-check').parent().find('b').text('');
            }
            if (tipo == "info") {
                $('#m').removeClass('blue').find('i').addClass('fa-info').parent().find('b').text(mgs);
            }
        }, 4000);

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

    },
    newsletter: function() {

        console.log("Promin.newsletter")

        var name_s = $('#name_s').val();

        var email_s = $('#email_s').val();

        var servicio_s = $('#servicio_s').val();


        if (!$('#aviso_s').prop("checked")) {

            alert("Debe aceptar el Aviso de Privacidad y los Términos y Condiciones de Uso.");

            return false;

        }

        $.ajax({

            method: "POST",

            url: "/newsletter",

            data: {
                linea: servicio_s,

                email: email_s,

                name: name_s

            },

            success: function(data) {

                console.log("success");
                var errors = data.responseJSON;
                
                promin.m('success','Se ha suscrito correctamente');
                
                $('#name_s').val('');
                $('#email_s').val('');
                $('#servicio_s').val('');

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

                $('#form-errors_s').html('').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  

            }

        });

    },
    wishlist:function(tipo,id) {
    	if(tipo=='delete'){
    		 $.ajax({

            method: "GET",

            url: "/wishlist-delete/"+id,

            success: function(data) {

                var errors = data.responseJSON;
                console.log(errors);
                $('#myModal'+id).modal('hide');
                $('#wish'+id).remove();

                promin.m('success','Se ha Suscrito Correctamente');
                 

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

                $('#form-errors_s').html('').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  

            }

        });
    	}
    }

}



$(document).ready(function() {

    $('#sendFormCreate').on('one', function(event) {

        event.preventDefault();

        promin.register();

    });



    $('#sendFormLogin').on('click', function(event) {

        event.preventDefault();

        promin.login();

    });



    $('#saveFormProfile').on('click', function(event) {

        event.preventDefault();

        promin.edit_profile();

    });

    $('input[name=cp]').on('blur', function(event) {

        event.preventDefault();

        promin.showCPS();

    });



    $('input[name=cp_2]').on('blur', function(event) {

        event.preventDefault();

        promin.showCPS2();

    });


    $('.del').on('click', function() {
        event.preventDefault();
        console.log('del calss');
        var producto_id = $(this).attr('producto');
        var wishlist_id = $(this).attr('wishlist');
        promin.wishlist('delete', wishlist_id);
    });

    $('#suscribirme').on('click', function() {
        event.preventDefault();
        console.log('newsletter ');         
        promin.newsletter();
    });

});