<?php
    include('../../connect.php');

    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $cupo = $_POST['cupo'];
    
    $query = "INSERT INTO activid (name_act,description,cupo,cred_act)
    VALUES ('$name', '$last', '$cupo','$cred')";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al crear actividad!  '. mysqli_error($con)); 
    }
    echo"Actividad creada correctamente!";
?>