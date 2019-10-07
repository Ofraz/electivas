<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $cupo = $_POST['cupo'];
    $id_inter = $_POST['id_inter'];
    
    $query = "UPDATE activid
    SET name_act ='$name',
    description ='$last',
    cupo = '$cupo',
    cred_act = '$cred',
    id_inter = '$id_inter'
    WHERE id_act = '$id'";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al actualizar la información!'. mysqli_error($con)); 
    }
    echo"Datos actualizados correctamente!";
?>