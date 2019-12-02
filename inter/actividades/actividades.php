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

    $query  = "SELECT * FROM inter WHERE id_inter = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    if ($row == 0){
        $query  = "SELECT * FROM alu WHERE boleta = '$_SESSION[user_id]'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        if ($row != 0){
            ?>
            <script type="text/javascript">
                      window.location.href = '../../alumno/home_u.php';
            </script>
          <?php
        }else{
            $query  = "SELECT * FROM admin  WHERE id_admin = '$_SESSION[user_id]'";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            if ($row != 0){
                ?>
          <script type="text/javascript">
                    window.location.href = '../../admin/home_admin.php';
          </script>
        <?php 
            }
        }
       
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intermediario - actividades </title>
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
        <a class="navbar-brand" href="../home_i.php">Electivas UPIICSA</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"> </a>
            </li>
        </ul>



        <div class="navbar-collapse collapse " id="navbarColor01" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../electivas/electivas.php">Electivas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Asistencias</a>
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
                        <h3 class="wlc"><?php echo $row['name_inter']," ",$row['ap_inter']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xl-10 mx-auto p-3">
                <div class="card">
                    <div class="card-header">
                        <H4>PASE DE LISTA</H4>
                    </div>
                    <div class="card-body">

                    <!-- Modal Despliegue de Actividad -->
                    <div class="modal fade" id="editar" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-upiicsa">
                                        <h5 class="modal-title" id="exampleModalLongTitle">LISTADO DE ALUMNOS </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="check_form">
                                    <div class="modal-body">
                                        <input type="hidden" id="Id">
                                        <input type="hidden" id="Id_act">
                                        <input type="search" id="search2" class="form-control mr-sm-2" placeholder="Buscar">
                                            <br><div class="container">
                                                <table class="table table-sm ">
                                                    <thead>
                                                        <tr>
                                                            <th>Boleta</th>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                            <th style="text-align:center">Asistencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dato"></tbody>
                                                </table>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="save" class="save btn btn-primary">Enviar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <input type="search" id="search" class="form-control mr-sm-2" placeholder="Buscar">
                        <div class="table-responsive">
                            <table class="table table-sm my-4">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Cupo</th>
                                        <th>Disp</th>
                                        <th>Creditos</th>
                                        <th>Asistencia</th>
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
    <script src="act.js"></script>
    <script src="../../componentes/bootstrap/js/bootstrap.js"></script>

</body>

</html>