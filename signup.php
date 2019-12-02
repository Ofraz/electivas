<?php
    session_start();
    include('connect.php');

    if(isset($_POST['name'])) {
        $tipo_usuario = $_POST['tipo_usuario'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $last_n = $_POST['last_n'];
        $email = $_POST['email'];
        
        switch ($tipo_usuario) {
            case 'admin':
                $query = "INSERT INTO admin (id_admin,password,name,ap,mail) 
                VALUES ('$user', '$password', '$name', '$last_n','$email')
                ON DUPLICATE KEY
                UPDATE name = '$name', 
                ap = '$last_n', password = '$password', mail = '$email'";
                $result = mysqli_query($con,$query);
                if(!$result){
                   die('error de consulta'.mysqli_error($con));
                }
                $_SESSION["user_id"] = $user;
                $alert = 'Administrador agregado';
                echo $tipo_usuario;
            break;
            case 'inter':
                $query = "INSERT into inter (id_inter,password,name_inter,ap_inter,mail)
                VALUES ('$user', '$password', '$name', '$last_n','$email')
                ON DUPLICATE KEY
                UPDATE name_inter = '$name', ap_inter = '$last_n', 
                password = '$password', mail = '$email'";
                $result = mysqli_query($con,$query);
                if(!$result){
                    die('error de consulta'.mysqli_error($con));
                }
                $_SESSION["user_id"] = $user;
                $alert = 'Docente agregado';
                echo $tipo_usuario;
        break;
            case 'alu':
                $query = "INSERT INTO alu (boleta,password,name_a,ap_a,mail) 
                VALUES ('$user', '$password', '$name', '$last_n','$email')
                ON DUPLICATE KEY
                UPDATE name_a = '$name', 
                ap_a = '$last_n', password = '$password', mail = '$email'";
                $result = mysqli_query($con,$query);
                if(!$result){
                   die('error de consulta'.mysqli_error($con));
                }
                $_SESSION["user_id"] = $user;
                $alert = 'Administrador agregado';
                echo $tipo_usuario;
            break;
            
        }
        exit();
}   
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear un Usuario</title>
    <link rel="icon" href="visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootswatch litera -->
    <link rel="stylesheet" href="css/Style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa">
        <a href="index.php" class="navbar-brand">Electivas UPIICSA</a>
    </nav>
    <div class="col-xl-6 col-md-8 mx-auto mt-4">
        <div class="card">
            <div class="card-header bg-upiicsa">
                <h5>Crear Usuario</h5>
            </div>
            <form id="signup-form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tipo_usuario">Tipo de Usuario</label>
                        <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                            <option value=''>SELECCIONA TIPO DE USUARIO</option>
                            <option value='admin'>P. Electivas</option>
                            <option value='inter'>Docente</option>
                            <option value='alu'>Alumno</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-6"><!-- -->
                                <div class="form-group">
                                    <label for="user">Usuario (Boleta/Cve.Trabajador)</label>
                                    <input type="text" id="user" placeholder="Usuario" class="form-control" minlength="10" maxlength="15"
                                    required>
                                    <div id ="user_result"></div>
                                </div>
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
                        <div class="col-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" placeholder="Nombre" class="form-control" minlength="3" maxlength="30"
                                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required>
                                    <div id ="name_result"></div>
                                </div>
                                <div class="form-group" id="form_user">
                                    <label for="last_n">Apellidos</label>
                                    <input type="text" id="last_n" placeholder="Apellidos" class="form-control" minlength="3" maxlength="40"
                                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required>
                                    <div id ="last_result"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" id="email" placeholder="Ingrese Correo" class="form-control" required>
                                    <div id ="mail_result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div>    
                <div class="card-footer">
                    <input type="submit" id="submit" name="submit" value="      Regístrate      " class="btn btn-rev-upiicsa">
                    <a class="link" href="login.php" style="float:right;margin-top:5px;">Ya tengo una cuenta</a>
                </div>
             </div>   
            </form>
        </div>
    </div>

    <script src="componentes/jquery-3.4.1.min.js"></script>
    <script src="componentes/bootstrap/js/bootstrap.js"></script>
    <script src="componentes/strength.js"></script>
    <script src="app.js"></script>

</body>

</html>