<?php
    include('../../connect.php');

    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $user = $_POST['user'];
    
    $query = "INSERT INTO alu (boleta, name_a, ap_a, cred)
    VALUES ('$user', '$name', '$last','$cred')";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al crear actividad!  '. mysqli_error($con)); 
    }
    echo"Actividad creada correctamente!";
?>