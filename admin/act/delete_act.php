<?php
    include('../../connect.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM activid WHERE id_act = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta'.mysqli_error($con));
        }
        $res = "ALTER TABLE activid AUTO_INCREMENT = 1";
        echo "Actividad Eliminada";
    }  
?>