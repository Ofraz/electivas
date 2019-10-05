<?php
    $con  = mysqli_connect("localhost","root","admin","electivas");
    if (!$con){
        die("Connection Failed : " . mysqli_connect_errno());
    }//else{ echo 'conexion exitosa';}
?>