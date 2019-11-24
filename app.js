jQuery(function(){
    console.log('jquery funciona');
    passStrength();
    
    //restrict whitespace user
    $('#user').keypress(function ( event ) {  
        var key = event.keyCode;
         if (key === 32) {
           event.preventDefault();
         }
     });

     $('#password').keypress(function ( event ) {  
        var key = event.keyCode;
         if (key === 32) {
           event.preventDefault();
         }
     });

    /* $('#last_n').keydown(function(e){
        if(e.keyCode != 32 && $(this).val().indexOf('') < 0){console.log('difff'); return true;}
        else if($.inArray(e.keyCode, 32) !== -1){
           e.preventDefault();
           restart
        } 
    });*/


    //validar name
    $('#name').keyup(function () {
        let search = $('#user').val();
        let compare = $('#name').val();
        if (search != "" && compare == search) {
            template= "<span style='font:bold;color:#ff3636;font-size:75%;'>el nombre no puede ser similar al usuario.</span>";
            $('#name_result').html(template);
            $('#submit').attr('disabled', true);
            $('#name').css({'border':'#ff3636'});
        }else{
            $('#name_result').html("");
            $('#submit').attr('disabled', false);
            $('#name').css({'border':'#e5e5e5'});
        }
    })

    //validar apellidos
    $('#last_n').keyup(function () {
        let search = $('#name').val();
        let compare = $('#last_n').val();
        if (search != "" && compare == search) {
            template= "<span style='font:bold;color:#ff3636;font-size:75%;'>Los apellidos no pueden ser iguales al nombre.</span>";
            $('#last_result').html(template);
            $('#submit').attr('disabled', true);
            $('#last_n').css({'border':'#ff3636'});
        }else{
            $('#last_result').html("");
            $('#submit').attr('disabled', false);
            $('#last_n').css({'border':'#e5e5e5'});
        }
    })

    //user disponible
    $('#user').keyup(function () {
        let search = $('#user').val();
        console.log(search);
        if (search != "") {
            $.ajax({
                url: 'validar_dispUser.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    if(response == "No disponible."){
                        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>No disponible.</span>";
                        $('#user_result').html(template);
                        $('#submit').attr('disabled', true);
                        $('#user').css({'border':'#ff3636'});
                        //document.getElementById("user").required = false;
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#user_result').html(template);
                        $('#submit').attr('disabled', false);
                        $('#user').css({'border':'#008000'});
                    }
                }
            })
        }else{$('#user_result').html("");
            $('#user').css({'border':'#e5e5e5'});}
    })

    //Registrarse
    $('#signup-form').submit(function(e){
    
        const postData= {
            tipo_usuario: document.getElementById("tipo_usuario").value, 
            user: $('#user').val(),
            password: $('#password').val(),
            name: $('#name').val(),
            last_n: $('#last_n').val()  
        };
        $.post('signup.php', postData, function (response){
            if(response == 'ad'){
                alert("Administrador agregado.");
                window.location= 'admin/home_admin.php';
            }
            if(response == 'us'){
                alert("Alumno agregado.");
                window.location= 'alumno/home_u.php';
            }
            if(response == 'in'){
                alert("Docente agregado.");
                window.location= 'inter/home_i.php';
            }
        });
        e.preventDefault();
    });

    function passStrength(){
    $('#password').strength({
        strengthClass: 'strength',
    })}

    $('#password_c').keyup(function (a) {
        let password =  $('#password').val();
        let password_c =  $('#password_c').val();
        if (password != "") {
            if(password == password_c) {
                template= "<span style='font:bold;color:green;font-size:75%;'>Contraseñas coinciden.</span>";
                $('#pass_result').html(template);
                $('#submit').attr('disabled', false);
            } else if(password != password_c) {
                template= "<span style='font:bold;color:red;font-size:75%;'>Contraseñas no coinciden.</span>";
                $('#pass_result').html(template);
                $('#submit').attr('disabled', true);
            } 
        }else {$('#pass_result').html("");}
         
    })
})
