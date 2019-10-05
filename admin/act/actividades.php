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
        <a class="navbar-brand" href="home_a.php">Electivas UPIICSA</a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" > </a>
            </li>
        </ul> 

        

        <div class="navbar-collapse collapse " id="navbarColor01" style="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Electivas</a>
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
           
                <div class="col-md-5 p-3">
                   <div class="card">
                       <div class="card-body">
                           <form id="task-form">
                             <div class="form-group">
                                 <input type="text" id="name" placeholder="Nombre de la tarea"
                                 class="form-control">
                             </div>
                             <div class="form-group">
                                 <textarea id="description" cols="30" rows="10"
                                 class="form-control" placeholder="Descripcion de tarea"></textarea>
                             </div>
                             <button type="submit" class="btn btn-primary btn-block
                              text-center">Salvar Tarea</button>
                           </form>
                       </div>
                   </div>     
                </div>
                
                
                <div class="col-12 col-md-7 col-xl-7 p-3">
                    <div class="card">
                        <div class="card-body">    
                            <input type="search" id="search_act" class="form-control mr-sm-2"
                            placeholder="Buscar">
                            <div class="table-responsive">
                            <table class="table  table-sm my-4">
                                <thead >
                                    <tr>
                                        <th>Id</th>
                                        <th>Actividad</th>
                                        <th>Descripción </th>
                                        <th>Créditos</th>
                                    </tr>
                                </thead>
                                <tbody id="datos_act"  ></tbody>
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