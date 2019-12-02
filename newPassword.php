<?php
include('connect.php');

if($_GET['key']){
    $token=$_GET['key'];
    $consult = "SELECT token,mail,id_admin FROM admin WHERE token ='$token'";
    $result = mysqli_query($con,$consult);
    $row = mysqli_fetch_array($result);
    if($row!=0){
        $mail = $row['id_admin'];
    }else{
        $consult = "SELECT token,mail,id_inter FROM inter WHERE token='$token'";
        $result = mysqli_query($con,$consult);
        $row = mysqli_fetch_array($result);
        if($row!=0){
            $mail = $row['id_inter'];
        }else{
            $consult = "SELECT token,mail,boleta FROM alu WHERE token='$token'";
            $result = mysqli_query($con,$consult);
            $row = mysqli_fetch_array($result);
            if($row!=0){
                $mail = $row['boleta'];
            }else{
                ?>
                    <h1>ENLACE NO VÁLIDO</h1>
                    <br><a class="link" href="index.php" style="float:left;margin-top:5px;">Ir a Pagina Principal</a>
                <?php
                die();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer Contraseña</title>
    <link rel="icon" href="visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootswatch litera -->
    <link rel="stylesheet" href="css/Style.css">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa">
        <a href="index.php" class="navbar-brand">Electivas UPIICSA</a>
    </nav>
    <form id="signup-forma">
        <div class="col-lg-4 col-md-8 mx-auto mt-5">
            <div class="card">
                <div class="card-header bg-upiicsa">
                    <center><h5>Restablecer Contraseña del usuario <br><text><?php echo $mail?></text></h5><center>
                </div>    
                <div class="card-body">
                <input type="hidden" id="email" value="<?php echo $mail?>">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" placeholder="Contraseña" minlength="8" maxlenght ="16"
                            class="form-control" pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[$&+,:;=?@#|'<>.^*()%!-])([^\s]){8,16}$" 
                            title="Al menos 8 caracteres. 1 mayuscula, 1 letra, 1 numero y 1 caracter '!$%&(-/:-?_{}~'" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmar Contraseña</label>
                        <input type="password" id="password_c" placeholder="Confirmar contraseña" class="form-control" 
                        title="Debe coincidir con la contraseña" required>
                        <div id ="pass_result"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" id="submit" name="submit" value="Enviar" class="btn btn-rev-upiicsa btn-block"> 
                </div>
            </div>
        </div>
    </form>

    <script src="componentes/jquery-3.4.1.min.js"></script>
    <script src="componentes/bootstrap/js/bootstrap.js"></script>
    <script src="componentes/strength.js"></script>
    <script src="app.js"></script>
    <script type="text/javascript">
     jQuery(function(){   

        $('#signup-forma').submit(function(e){
           password= $('#password').val(),
           email= $('#email').val()
           $.post('updatePass.php', {email,password}, function (response){
               alert("¡Contraseña Actualizada! Inicia Sesión");
               window.location= 'login.php';
           })  
            e.preventDefault();
        })

     });
    </script>
    </body>

</html>