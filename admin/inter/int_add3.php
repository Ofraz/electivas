<?php
    include('../../connect.php');

    $name = $_POST['name'];
    $last = $_POST['last'];
    $user = $_POST['user'];
    
    $query = "INSERT INTO inter (id_inter, name_inter, ap_inter)
    VALUES ('$user', '$name', '$last')";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al crear actividad!  '. mysqli_error($con)); 
    }
    echo"Alumno registrado correctamente!";
?>