<?php
    session_start();
    include('../../connect.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "INSERT INTO alu_act (id_act,boleta)
        VALUES ('$id', '$_SESSION[user_id]')";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error de Consulta'.mysqli_error($con));
        }
        $res = "ALTER TABLE activid AUTO_INCREMENT = 1";
        echo "¡Actividad Inscrita!";
    }  
?>