<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $user = $_POST['user'];
    $cupo = $_POST['cupo'];
    
    $query = "UPDATE inter
    SET name_inter ='$name',
    ap_inter = '$last',
    id_inter = '$user' 
    WHERE id_inter = '$id' ";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al actualizar la información!'. mysqli_error($con)); 
    }
    echo"Datos actualizados correctamente!";
?>