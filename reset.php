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



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa">
        <a href="index.php" class="navbar-brand">Electivas UPIICSA</a>
    </nav>
    <form method="post">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-header ">
                    <h5>Recuperar Contraeña</h5>
                <div class="card-body">
                    <div class="card-block">
                                <div class="form-group">
                                    <label for="name">Correo Electronico</label>
                                    <input type="email" id="email" placeholder="Ingrese Correo" class="form-control" required>
                                    <div id ="mail_result"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" id="submit" name="submit" value="Enviar" class="btn btn-outline-success btn-block">
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </form>
    <script src="componentes/jquery-3.4.1.min.js"></script>

    <script src="componentes/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
     jQuery(function(){   
        $('#email').keyup(function () {
            let search = $('#email').val();
            console.log(search);
            if (search != "") {
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
        });

        $('#signup-form').submit(function(e){
            email = $('#email').val();
            console.log(email);
            $.post('resetForm.php',{email},function(response){
                alert('response');
                window.location= 'index.php';
            })
        })
     });
    </script>

</body>

</html>