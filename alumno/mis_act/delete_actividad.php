<?php
    session_start();
    include('../../connect.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM alu_act WHERE id_act = '$id' AND boleta ='$_SESSION[user_id]'";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta'.mysqli_error($con));
        }
        /*$res = "ALTER TABLE alu_act AUTO_INCREMENT = 1";
        $result2 = mysqli_query($con, $query);
        if(!$result2) {
            die('Error de Consulta'.mysqli_error($con));
        }*/
        echo "Actividad Eliminada";
    }  
?>