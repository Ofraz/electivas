<?php
    include('../../connect.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM inter WHERE id_inter = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta');
        }
        echo "Actividad Eliminada";
    }  
?>