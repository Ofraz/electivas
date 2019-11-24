<?php
    include('../../connect.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "UPDATE activid SET id_inter = '0' WHERE id_act = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta'.mysqli_error($con));
        }
        $res = "ALTER TABLE activid AUTO_INCREMENT = 1";
        echo "Actividad Deslindada!";
    }  

    if(isset($_POST['id_d'])) {
        $id = $_POST['id_d'];
        $query = "DELETE FROM activid WHERE id_act = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta'.mysqli_error($con));
        }
        $res = "ALTER TABLE activid AUTO_INCREMENT = 1";
        echo "Actividad Eliminada";
    }  
?>