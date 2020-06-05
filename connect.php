<?php
    $con  = mysqli_connect("localhost","rot","admin","electivas");
    if (!$con){
        die("Connection Failed : " . mysqli_connect_errno());
    }//else{ echo 'conexion exitosa';}
    
    if (!$con->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
       die("Error cargando el conjunto de caracteres utf8");
    }
?>