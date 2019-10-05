<?php
    session_start();
    include ('../../connect.php');

    $query  = "SELECT * FROM admin WHERE id_admin = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador - actividades</title>
    <link rel="icon" href="../../visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../componentes/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../componentes/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <!--bootswatch litera -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa sticky-top">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="#navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <a class="navbar-brand" href="../home_admin.php">Electivas UPIICSA</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"> </a>
            </li>
        </ul>



        <div class="navbar-collapse collapse " id="navbarColor01" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../act/actividades.php">Actividades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../alu/home_a.php">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Intermediarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../vali/home.php">Validaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>

    </nav>


    <div class="container p-4">
        <!--p-4: padding/espaciado 4-->
        <div class="row">
            <div class="col-xl-10 mx-auto ">
                <div class="card">
                    <div class="card-body">
                        <h3 class="wlc">Bienvenido <?php echo $row['name']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xl-10 mx-auto p-3">
                <div class="card">
                    <div class="card-header"><H4>INTERMEDIARIOS</H4></div>
                    <div class="card-body">
                        <!-- Modal Agregar -->
                        <div class="modal fade" id="alta" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-upiicsa">
                                        <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR INTERMEDIARIO </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="Id">
                                        <div class="form-group">
                                            <label for="user_e">No. Trabajador</label>
                                            <input type="text" id="user_e" placeholder="Usuario" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_e">Nombre</label>
                                            <input type="text" id="name_e" placeholder="Nombre" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_ne">Apellidos</label>
                                            <input type="text" id="last_ne" placeholder="Apellidos" class="form-control">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="button" id="save" class="save btn btn-primary">Crear</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Editar -->
                        <div class="modal fade" id="editar" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div metod="POST" class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-upiicsa">
                                        <h5 class="modal-title" id="exampleModalLongTitle">MODIFICAR ACTIVIDAD </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="Id">
                                        <div class="form-group">
                                            <label for="user_e">No. Trabajador</label>
                                            <input type="text" id="user_e" placeholder="Usuario" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_e">Nombre</label>
                                            <input type="text" id="name_e" placeholder="Nombre" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_ne">Apellidos</label>
                                            <input type="text" id="last_ne" placeholder="Apellidos" class="form-control">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="button" id="save_e" class="save_e btn btn-primary">Salvar
                                            Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form p-2"><button class="btn btn-primary" data-toggle="modal" data-target="#alta">
                                <span class="glyphicon glyphicon-plus"> Añadir</span>
                            </button> </div>
                        <input type="search" id="search" class="form-control mr-sm-2" placeholder="Buscar">
                        <div class="table-responsive">
                            <table class="table table-sm my-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                    </tr>
                                </thead>
                                <tbody id="datos"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../componentes/jquery-3.4.1.min.js"></script>
    <script src="int.js"></script>
    <script src="../../componentes/bootstrap/js/bootstrap.js"></script>

</body>

</html>