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

            /*switch (postData.tipo_usuario){
                case 'ad':
                    window.location= 'admin/home_a.php';
                break;
                case 'us':
                    window.location= 'alumno/home_u.php';
                break;
                case 'in':
                    window.location= 'inter/home_i.php';
                break;
            }*/

        });
        e.preventDefault();

    });
})
