<?php
    session_start();
    include ('../connect.php');

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
    <link rel="icon" href="../visual/upiicsa.bmp" type="image/bmp">
    <link rel="stylesheet" href="../css/Style.css">
    <link rel="stylesheet" href="../componentes/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.css"> <!--bootswatch litera -->
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-upiicsa sticky-top">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" 
                data-target="#navbarColor01" aria-controls="#navbarColor01" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>				
        </button>  
        <a class="navbar-brand bg-dark" href="#">Electivas UPIICSA</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" > </a>
            </li>
        </ul> 

        

        <div class="navbar-collapse collapse " id="navbarColor01" style="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="actividades.php">Electivas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Cerrar Sesión</a>
            </li>
        </ul>
        </div>
        
    </nav>


<div class="container p-4"> <!--p-4: padding/espaciado 4-->
        <div class="row">
            <div class="col-xl-12 ">
            <div class="card">
                <div class="card-body">
                    <h3 class="wlc">Bienvenido <?php echo $row['name']; ?></h3>
                </div> 
            </div>    
            </div>
            <div class="col-12 col-md-10 col-xl-9 mx-auto p-3">
                <div class="card">
                    <div class="card-body">
<!-- Modal Agregar -->
<div class="modal fade" id="alta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Salvar Cambios</button>
      </div>
    </div>
  </div>
</div>   

                        <div class="form p-2"><button class="btn btn-primary" data-toggle="modal" data-target="#alta">
                        <span class="glyphicon glyphicon-plus"> Añadir</span>
                            </button>   </div>
                            <input type="search" id="search" class="form-control mr-sm-2"
                            placeholder="Buscar">
                       <div class="table-responsive">
                            <table class="table table-sm my-4">
                                <thead >
                                    <tr>
                                        <th>Id</th>
                                        <th>Password</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                    </tr>
                                </thead>
                            
                         

                                <tbody id="datos"  ></tbody>
                            </table>
                            </div>
                        </div>
                </div>    
                </div>
            </div>
        </div>

<script src="../componentes/jquery-3.4.1.min.js"></script>
<script src="admin.js"></script>    
<script src="../componentes/bootstrap/js/bootstrap.js"></script>


</body>
</html>