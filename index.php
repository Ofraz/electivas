<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Electivas UPIICSA</title>
    <link rel="icon" href="visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="componentes/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="componentes/darkmode/dark-mode.css">
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
                    <a class="nav-link" href="login.php">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Regístrate</a>
                </li>
            </ul>
        </div>

        <div class="nav-link">
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
            <label for="darkSwitch"><img src="visual/moon.png" width="24" height="24"></label>
          </div>
          <script src="componentes/darkmode/dark-mode-switch.js"></script>
        </div>
    </nav>


    <!--Mask-->
    <div id="intro" class="view">

        <div class="mask rgba-black-strong">

            <div class="container-fluid d-flex align-items-center justify-content-center h-100">

                <div class="row d-flex justify-content-center text-center">

                    <div class="col-md-10 p-4">

                        <!-- Heading -->
                        <h2 class="display-4 font-weight-bold text-white pt-5">Electivas UPIICSA</h2>

                        <!-- Divider -->
                        <hr class="hr-light">

                        <!-- Description -->
                        <h4 class="text-white my-4">Todas las actividades en un solo lugar</h4>
                        <button onclick="window.location='https://www.upiicsa.ipn.mx'" type="button"
                            class="btn btn-light">Acerca de la UPIICSA</button>


                    </div>

                </div>

            </div>

        </div>

    </div>
    <!--/.Mask-->
    
    <!--Main layout-->
    <main class="mt-5" role ="main">
        <div class="container">

            <!--Section: Best Features-->
            <section id="best-features" class="text-center">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold">Acerca de</h2>

                <!--Grid row-->
                <div class="row d-flex justify-content-center mb-4">

                    <!--Grid column-->
                    <div class="col-md-8">

                        <!-- Description -->
                        <p class="grey-text"></p>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4 mb-5">
                        <i class="fa fa-camera-retro fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Alumnos</h4>
                        <p class="grey-text">Pueden llevar un control de todas sus actividades, verificar cuántos
                            créditos poseen y validar la participación en las actividades registradas</p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-1">
                        <i class="fa fa-heart fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Personal de Electivas</h4>
                        <p class="grey-text">Gestionar todas las actividades en las que pueden participar los alumnos, a
                            los usuarios y validar las evidencias de los estudiantes.</p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-1">
                        <i class="fa fa-bicycle fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Responsables de Actividades</h4>
                        <p class="grey-text">Llevar un control de los pases de lista dentro de sus actividades de forma
                            digital, la cuál será enviada a Electivas de forma digital.</p>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
            </section>
        </div>
    </main>
            <script src="componentes/jquery-3.4.1.min.js"></script>
            <script src="componentes/bootstrap/js/bootstrap.js"></script>

</body>

</html>