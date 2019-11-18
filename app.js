jQuery(function(){
    console.log('jquery funciona');

    //Registrarse
    $('#signup-form').submit(function(e){
        const postData= {
            tipo_usuario: document.getElementById("tipo_usuario").value, 
            user: $('#user').val(),
            password: $('#password').val(),
            name: $('#name').val(),
            last_n: $('#last_n').val()  
        };
        console.log({postData});

        $.post('signup.php', postData, function (response){
            console.log(response);    
            alert('Usuario registrado!. Inicie sesión');
            window.location= 'login.php';
        });
        e.preventDefault();
    });

    $('#password').strength({
        strengthClass: 'strength',
    });

    var password = document.getElementById("password")
  , password_c = document.getElementById("password_c");

function validatePassword(){
  if(password.value != password_c.value) {
    password_c.setCustomValidity("Contraseñas no coinciden");
  } else {
    password_c.setCustomValidity('Contraseñas coinciden');
  }
}

password.onchange = validatePassword;
password_c.onkeyup = validatePassword;
})
