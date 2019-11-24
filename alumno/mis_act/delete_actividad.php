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
        
        $query_u = "UPDATE activid SET disp = disp + 1
        WHERE id_act = '$id'";
        
        $result1 = mysqli_query($con, $query_u);
        if(!$result1) {
            die('Error de Consulta'.mysqli_error($con));
        }
        echo "Actividad Eliminada";
    }  
?>