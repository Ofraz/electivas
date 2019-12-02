<?php
    session_start();
    include ('../connect.php');

    if (!isset($_SESSION['user_id'])) {
        ?>
          <script type="text/javascript">
                    window.location.href = '../index.php';
          </script>
        <?php
            die;
        
    } 

    $query  = "SELECT * FROM alu WHERE boleta = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    if ($row == 0){
        $query  = "SELECT * FROM admin WHERE id_admin = '$_SESSION[user_id]'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        if ($row != 0){
            ?>
            <script type="text/javascript">
                      window.location.href = '../admin/home_admin.php';
            </script>
          <?php
        }else{
            $query  = "SELECT * FROM inter WHERE id_inter = '$_SESSION[user_id]'";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            if ($row != 0){
                ?>
          <script type="text/javascript">
                    window.location.href = '../inter/home_i.php';
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
    <title>Alumno</title>
    <link rel="icon" href="../visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../componentes/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
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
        <a class="navbar-brand" href="#">Electivas UPIICSA</a>

        



        <div class="navbar-collapse collapse " id="navbarColor01" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="electivas/elec.php">Electivas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mis_act/act.php">Mis Actividades</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="validacionas/home_v.php">Validaciones</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Cerrar Sesión</a>
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
                        <h3 class="wlc">Bienvenido <?php echo $row['name_a']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-xl-10 mx-auto p-3">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="val_c" value="<?php echo $row['boleta']; ?>">
                        <input type="hidden" id="val_a" value="<?php echo $row['cred']; ?>">
                        <input type="hidden" id="val_b" value="<?php echo $row['carrera']; ?>">
                        <div class="row">
                            <div class="col">
                                <h4>Nombre: <?php echo $row['name_a']; ?></h4>
                                <h4>Apellidos: <?php echo $row['ap_a']; ?></h4>
                                <h4>Boleta: <?php echo $row['boleta']; ?></h4>
                                <h4>Creditos : <?php echo $row['cred']; ?></h4>
                                <h4 id="c_carrera">Creditos a cubrir: <?php echo $row['carrera']; ?></h4>
                            </div>
                            <div id="carrera">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../componentes/jquery-3.4.1.min.js"></script>
    <script src="alumno.js"></script>
    <script src="../componentes/bootstrap/js/bootstrap.js"></script>

</body>

</html>