<?php
    session_start();
    include('../../connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $cupo = $_POST['cupo'];
    $disp = $_POST['disp'];
    $disp2 = $_POST['available'];

    $res = ($disp - $cupo);
    $new = ($disp2 - $res);
    if($new<0){
        echo "No se pueden actualizar los datos. La reducción excede los lugares aun disponibles: ",$disp2, "
        El resto de las modificaciones fueron hechas Exitosamente!.";
        $query = "UPDATE activid
        SET name_act ='$name',
        description ='$last',
        cred_act = '$cred'
        WHERE id_inter = '$_SESSION[user_id]' AND id_act ='$id'";

        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error al actualizar la información!'. mysqli_error($con)); 
        }
    }else{
    
    $query = "UPDATE activid
    SET name_act ='$name',
    description ='$last',
    cupo = '$cupo',
    cred_act = '$cred',
    disp = '$new'
    WHERE id_inter = '$_SESSION[user_id]' AND id_act ='$id'";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error al actualizar la información!'. mysqli_error($con)); 
    }
    echo"Datos actualizados correctamente!";}
?>