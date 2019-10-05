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
    <title>Iniciar Sesión</title>
    <link rel="icon" href="visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootswatch litera -->
    <link rel="stylesheet" href="css/Style.css">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa">
        <a href="index.php" class="navbar-brand">Electivas UPIICSA</a>
    </nav>

    <?php
    $user = $passwd = $error = "";
    $errorflag = false;

    /*$erroruser = "<h3 class='erroruser'>Usuario requerido</h3>";
    $errorpasswd = "<h3 class='errorpasswd'>Password Requerido...!</h3>";*/

    if (isset($_POST["submit"])){
        if (empty($_POST["user"])){
            //echo $erroruser;
            $errorflag = false;
        }else{
            $user = validation_input($_POST["user"]);
            $errorflag = true;
        }

        if (empty($_POST["passwd"])){
            echo $errorpasswd;
            $errorflag = false;
        }else{
            $len = strlen($_POST["passwd"]);
            if ($len > 15 || $len < 2){
                $error = "Contraseña de 2 a 15 Caracteres!";
                echo $error;
                $errorflag= false;
            }else{
                $passwd = validation_input($_POST["passwd"]);
                $errorflag = true;
            }
        }


        if ($errorflag = true){
            //ADMINISTRADOR
            $query = "SELECT * FROM admin WHERE id_admin = '$_POST[user]' AND password = '$_POST[passwd]'";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            if ($row > 0){
                $_SESSION["user_id"] = $row["id_admin"];
                $home_url = 'admin/home_admin.php';
                header('Location: '. $home_url);
            }else{

            //INTERMEDIARIO
            $query = "SELECT * FROM inter WHERE id_inter = '$_POST[user]' AND password = '$_POST[passwd]'";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            if ($row > 0){
                $_SESSION["user_id"] = $row["id_inter"];
                $home_url = 'inter/home_i.php';
                header('Location: '. $home_url);
            }else{
            
            //ALUMNO
            $query = "SELECT * FROM alu WHERE boleta = '$_POST[user]' AND password = '$_POST[passwd]'";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            if ($row > 0){
                $_SESSION["user_id"] = $row["boleta"];
                $home_url = 'alumno/home_u.php';
                    header('Location: '. $home_url);
            }else {
                    $error = "Usuario o Contraseña Incorrectos";
        
                }}}
        }
    }

    function validation_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>
    <form method="post">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-header bg-upiicsa">
                    <h5>Inicio de Sesión</h5>
                </div>
                <div class="card-body">
                    <form id="login-form">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input class="form-control" type="text" name="user" placeholder="Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" type="password" name="passwd" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <span style="color: red"><?php echo $error; ?></span>
                        </div>
                        <input type="submit" id="sub" name="submit" value="Iniciar Sesión"
                            class="btn btn-block btn-upiicsa">

                        <div><a href="signup.php" style="float:right;margin-top:5px;">Registrarse</a></div>


                </div>
            </div>
        </div>
        </div>
    </form>
    <script src="componentes/jquery-3.4.1.min.js"></script>
    <script src="componentes/bootstrap/bootstrap.js"></script>

</body>

</html>