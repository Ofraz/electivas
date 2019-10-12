<?php
    include('../../connect.php');

    $name = $_POST['name_a'];
    $last = $_POST['last_a'];
    $cred = $_POST['cred_a'];
    $user = $_POST['user_a'];
    
    $query = "INSERT INTO alu (boleta, name_a, ap_a, cred)
    VALUES ('$user', '$name', '$last','$cred')";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al crear actividad!  '. mysqli_error($con)); 
    }
    echo"Alumno registrado correctamente!";
?>