<?php
    include('../../connect.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM alu WHERE boleta = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta');
        }
        echo "Alumno Eliminado";
    }  
?>