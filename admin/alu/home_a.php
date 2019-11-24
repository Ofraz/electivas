<?php
    session_start();
    include ('../../connect.php');

    if (!isset($_SESSION['user_id'])) {        
        ?>
          <script type="text/javascript">
                    window.location.href = '../../index.php';
          </script>
        <?php
            die;        
    } 

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
    <title>Administrador - inicio</title>
    <link rel="icon" href="../../visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="../../css/Style.css">
    <link rel="stylesheet" href="../../componentes/bootstrap/css/bootstrap.css">
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
                    <a class="nav-link" href="../act/actividades.php">Electivas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../inter/home_int.php">Intermediarios</a>
                </li>
               <!-- <li class="nav-item">
                    <a class="nav-link" href="../vali/home.php">Validaciones</a>
                </li> -->
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
                        <h3 ><?php echo $row['name']," ",$row['ap']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xl-10 mx-auto p-3">
                <div class="card">
                <div class="card-header"><H4>ALUMNOS</H4></div>
                    <div class="card-body">
                        <!-- Modal Agregar -->
                        <div class="modal fade" id="alta" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-upiicsa">
                                        <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR ALUMNO</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" id="alta_form">
                                        <div class="form-group">
                                            <label for="user_a">Boleta</label>
                                            <input type="text" id="user_a" placeholder="Usuario" class="form-control" minlenght="10" maxlenght="10"
                                            pattern="[0-9\s]" title="Solo se admiten numeros" required>
                                            <div id ="user_resulta"></div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="name_e">Nombre</label>
                                            <input type="text" id="name_a" placeholder="Nombre" class="form-control"
                                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required> 
                                            <div id ="name_resulta"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_ne">Apellidos</label>
                                            <input type="text" id="last_na" placeholder="Apellidos" class="form-control"
                                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required> 
                                            <div id ="last_resulta"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_ne">Creditos</label>
                                            <input type="number" min="0" max="20"id="cred_a" placeholder="creditos" class="form-control" required>
                                        </div>                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" id="save" class="btn btn-primary">Crear</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Editar -->
                        <div class="modal fade" id="editar" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div metod="POST" class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-upiicsa">
                                        <h5 class="modal-title" id="exampleModalLongTitle">MODIFICAR DATOS DE ALUMNO </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" id="editar_form">
                                        <input type="hidden" id="Id">
                                        <div class="form-group">
                                            <label for="user_e">Boleta</label>
                                            <input type="text" id="user_e" placeholder="Usuario" class="form-control"
                                            pattern="[0-9\s]+" title="Solo se admiten números" required>
                                            <div id ="user_resulte"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_e">Nombre</label>
                                            <input type="text" id="name_e" placeholder="Nombre" class="form-control"
                                            class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required>
                                            <div id ="name_resulte"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_ne">Apellidos</label>
                                            <input type="text" id="last_ne" placeholder="Apellidos" class="form-control"
                                            class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No se admiten números ni caracteres especiales" required> 
                                            <div id ="last_resulte"></div>

                                        </div>
                                        <div class="form-group">
                                            <label for="last_ne">Creditos</label>
                                            <input type="number" min="0" max="20" id="cred_e" placeholder="creditos" class="form-control" required>
                                        </div>                                        
                                    </div>
                                        
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="save_e" class="save_e btn btn-primary">Salvar Cambios</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="form p-2"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#alta">Añadir
                                <span class="glyphicon glyphicon-plus" style="primary"></span>
                            </button> </div>
                        <input type="search" id="search" class="form-control mr-sm-2" placeholder="Buscar">
                        <div class="table-responsive">
                            <table class="table table-sm my-4">
                                <thead>
                                    <tr>
                                        <th>Boleta</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Creditos</th>
                                        <th style="text-align:center">Editar</th>
                                        <th style="text-align:center">Borrar</th>
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
    <script src="alumn.js"></script>
    <script src="../../componentes/bootstrap/js/bootstrap.js"></script>

</body>

</html>