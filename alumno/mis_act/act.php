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

    $query  = "SELECT * FROM alu WHERE Boleta = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno</title>
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
        <a class="navbar-brand" href="../home_u.php">Electivas UPIICSA</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"> </a>
            </li>
        </ul>



        <div class="navbar-collapse collapse " id="navbarColor01" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../electivas/elec.php">Electivas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mis Actividades</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="../valiaciones/home_val.php">Validaciones</a>
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
                        <h3 class="wlc"><?php echo $row['name_a']," ",$row['ap_a']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xl-10 mx-auto p-3">
                <div class="card">
                    <div class="card-header">
                        <H4>MIS ACTIVIDADES</H4>
                    </div>
                    <div class="card-body">
                        <input type="search" id="search" class="form-control mr-sm-2" placeholder="Buscar">
                        <div class="table-responsive">
                            <table class="table table-sm my-4">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Creditos</th>
                                        <th>Responsable</th>
                                        <th>inscribir</th>
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
    <script src="mis_act.js"></script>
    <script src="../../componentes/bootstrap/js/bootstrap.js"></script>

</body>

</html>