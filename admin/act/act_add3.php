<?php
    include('../../connect.php');

    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $cupo = $_POST['cupo'];
    $id_inter = $_POST['id_inter'];

    $query = "INSERT INTO activid (name_act, description, cupo, disp, cred_act, id_inter)
    VALUES ('$name', '$last', '$cupo','$cupo','$cred', '$id_inter')";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al crear actividad!  '. mysqli_error($con)); 
    }
    echo"Actividad creada correctamente!";
?>