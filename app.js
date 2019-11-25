jQuery(function(){
    console.log('jquery funciona');
    passStrength();
    
    //restrict whitespace user

     $('#password').keypress(function ( event ) {  
        var key = event.keyCode;
         if (key === 32) {
           event.preventDefault();
         }
     });

     $(document).ready(function () {
        //called when key is pressed in textbox
        $("#user").keypress(function (e) {
           //if the letter is not digit then display error and don't type anything
           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errmsg").html("Sólo numeros").show()
                     return false;
          }
         });
      });


    //validar name
    $('#name').keyup(function () {
        let search = $('#user').val();
        let compare = $('#name').val();
        if (search != "" && compare == search) {
            template= "<span style='font:bold;color:#ff3636;font-size:75%;'>el nombre no puede ser similar al usuario.</span>";
            $('#name_result').html(template);
            $('#submit').attr('disabled', true);
        }else{
            $('#name_result').html("");
            $('#submit').attr('disabled', false);
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
        }else{
            $('#last_result').html("");
            $('#submit').attr('disabled', false);
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
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#user_result').html(template);
                        $('#submit').attr('disabled', false);
                    }
                }
            })
        }else{$('#user_result').html("");
        $('#submit').attr('disabled', false);}
    })

    //Mail validation
    $('#email').keyup(function () {
        let search = $('#email').val();
        console.log(search);
        if (search != "") {
            $.ajax({
                url: 'validar_dispMail.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    if(response == "No disponible."){
                        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>No disponible.</span>";
                        $('#mail_result').html(template);
                        $('#submit').attr('disabled', true);
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#mail_result').html(template);
                        $('#submit').attr('disabled', false);
                    }
                }
            })
        }else{$('#mail_result').html("");
        $('#submit').attr('disabled', false);}
    })

    //Registrarse
    $('#signup-form').submit(function(e){
    
        const postData= {
            tipo_usuario: document.getElementById("tipo_usuario").value, 
            user: $('#user').val(),
            password: $('#password').val(),
            name: $('#name').val(),
            last_n: $('#last_n').val(),
            email: $('#email').val()  
        };
        $.post('signup.php', postData, function (response){
            console.log(response)
            if(response == 'admin'){
                alert("Administrador agregado.");
                window.location= 'admin/home_admin.php';
            }else
            if(response == 'alu'){
                alert("Alumno agregado.");
                window.location= 'alumno/home_u.php';
            }else
            if(response == 'inter'){
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
