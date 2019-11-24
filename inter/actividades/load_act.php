<?php
include ('../../connect.php');
    $id = $_POST['id'];

        $query = "UPDATE alu as A INNER JOIN alu_act as AA
        ON AA.boleta=A.boleta INNER JOIN activid AS C
        ON C.id_act=AA.id_act SET A.cred = A.cred+C.cred_act WHERE AA.id_act ='$id' 
        AND AA.asist = '1'";
        $result = mysqli_query($con, $query);
        
        if(!$result) {
            die('Consulta Fallida'.mysqli_error($con));
        }
        $query0= "DELETE FROM activid WHERE id_act ='$id'";
        $result0 = mysqli_query($con, $query0);
        echo '¡Actividad Procesada!';  

?>
