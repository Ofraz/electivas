<?php
    session_start();
    require_once ('connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>
    <link rel="icon" href="visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootswatch litera -->
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="componentes/darkmode/dark-mode.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa">
        <a href="index.php" class="navbar-brand">Electivas UPIICSA</a>
        
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item dropdown">
                <div class="nav-link">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="darkSwitch">
                        <label for="darkSwitch"><img src="visual/moon.png" width="24" height="24"></label>
                    </div>
                    <script src="componentes/darkmode/dark-mode-switch.js"></script>
                </div>
            </li>
        </ul>
    </nav>
    <form id="signup-form">
        <div class="col-lg-4 col-md-8 mx-auto mt-5">
            <div class="card">
                <div class="card-header bg-upiicsa">
                    <h5>Recuperar Contraseña</h5>
                </div>    
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Correo Electrónico</label>
                        <input type="email" id="email" placeholder="Ingrese Correo" class="form-control" required>
                        <div id ="mail_result"></div>
                    </div>
                    <input type="submit" id="submit" name="submit" value="Enviar" class="btn btn-rev-upiicsa btn-block"> 
                </div>
                <div class="card-footer">
                    <center><a class="link" href="login.php" style="text-align:center;margin-bottom:15px;">Iniciar Sesion</a></center>
                </div>
            </div>
        </div>
    </form>
    <script src="componentes/jquery-3.4.1.min.js"></script>

    <script src="componentes/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
     jQuery(function(){   
        $('#email').keyup(function () {
            let search = $('#email').val();
            var src = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            console.log(search);
            if (search != "" && src.test(search) ) {
                $.ajax({
                    url: 'validar_dispMail.php',
                    type: 'POST',
                    data: {search},
                    success: function (response) {
                        if(response != "No disponible."){
                            template= "<span style='font:bold;color:#ff3636;font-size:75%;'>Correo no existe</span>";
                            $('#mail_result').html(template);
                            $('#submit').attr('disabled', true);
                        }
                        else if(response != "Disponible."){
                            template= "<span style='font:bold;color:#008000;font-size:75%;'>Correo existente.</span>";
                            $('#mail_result').html(template);
                            $('#submit').attr('disabled', false);
                        }
                    }
                })
            }else{$('#mail_result').html("");
            $('#submit').attr('disabled', false);}
        })

        $('#signup-form').submit(function(e){
           email= $('#email').val(),
            console.log(email);
            $.post('token.php', {email}, function (response){
                console.log(response);
                $.post('datosMail.php', {email}, function (response){
                    let busca = JSON.parse(response);
                    console.log(response);
                    $.post('resetForm.php', busca, function (response){
                        alert(response); 
                    })
                })
            })    
            e.preventDefault();
        })
     });
    </script>

</body>

</html>