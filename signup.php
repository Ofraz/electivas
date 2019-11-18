<?php
      session_start();
    include('connect.php');

    if(isset($_POST['name'])) {
        $tipo_usuario = $_POST['tipo_usuario'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $last_n = $_POST['last_n'];
        
        

        switch ($tipo_usuario) {
            case 'ad':
                    $query = "INSERT into admin (id_admin,password,name,ap)
                    VALUES ('$user', '$password', '$name', '$last_n')";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);

                    if(!$result){
                       // die('error de consulta'.mysqli_error($con));
                    }
                    $_SESSION["user_id"] = $row["id_admin"];
                    $alert = 'Administrador agregado';
                    echo $alert;
            break;
            case 'us':
                    $query = "INSERT into alu (boleta,password,name_a,ap_a)
                    VALUES ('$user', '$password', '$name', '$last_n')";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);
                    if(!$result){
                       // die('error de consulta'.mysqli_error($con));
                    }
                    $_SESSION["user_id"] = $row["boleta"];
                    $alert = 'Alumno agregado';
                    echo $alert;
            break;
            case 'in':
                    $query = "INSERT into inter (id_inter,password,name_inter,ap_inter)
                    VALUES ('$user', '$password', '$name', '$last_n')";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);
                    if(!$result){
                       // die('error de consulta'.mysqli_error($con));
                    }
                    $_SESSION["user_id"] = $row["id_inter"];
                    $alert = 'Docente agregado';
                    echo $alert;
            break;
        }
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear un Usuario-Electivas UPIICSA</title>
    <link rel="icon" href="visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootswatch litera -->
    <link rel="stylesheet" href="css/Style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa">
        <a href="index.php" class="navbar-brand">Electivas UPIICSA</a>
    </nav>

    <div class="col-md-8 mx-auto mt-4">
        <div class="card">
            <div class="card-header bg-upiicsa">
                <h5>Crear Usuario</h5>
            </div>
            <form id="signup-form">
                <div class="card-body">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="tipo_usuario">Tipo de Usuario</label>
                                    <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                                        <option value=''>SELECCIONA TIPO DE USUARIO</option>
                                        <option value='ad'>Administrador</option>
                                        <option value='us'>Alumno</option>
                                        <option value='in'>Docente</option>
                                    </select>
                                </div>
                                <!-- -->
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" placeholder="Nombre" 
                                    class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_n">Apellidos</label>
                                    <input type="text" id="last_n" placeholder="Apellidos" 
                                    class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required>
                                </div>

                            </div>
                            <div class="col-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="user">Usuario (Boleta/Num.Trabajador)</label>
                                    <input type="text" id="user" placeholder="Usuario" 
                                    class="form-control" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten caracteres especiales" required>
                                </div>
                                <form id="verifica">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" id="password" placeholder="Contraseña"
                                            class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}" 
                                            title="Al menos 8 caracteres. 1 mayuscula, 1 letra, 1 numero y 1 caracter especial" required>
                
                                        <label for="password">Confirmar Contraseña</label>
                                        <input type="password" id="password_c" placeholder="Contraseña"
                                            class="form-control" required />
                                        <span id='message'></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" id="submit" name="submit" value="Regístrate" class="btn btn-primary">
                            <a href="login.php" style="float:right;margin-top:5px;">Ya tengo una cuenta</a>
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