<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $user = $_POST['user'];
    $cred = $_POST['cred'];
    
    $query = "UPDATE alu
    SET name_a ='$name',
    ap_a='$last',
    cred = '$cred',
    boleta = '$user'
    WHERE boleta = '$id' ";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al actualizar la información!'. mysqli_error($con)); 
    }
    echo"Datos actualizados correctamente!";
?>