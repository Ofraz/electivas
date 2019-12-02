<?php
    session_start();
    include('../connect.php');

    if(isset($_POST['val'])) {
        $var = $_POST['val'];
        $query = "UPDATE alu
    SET carrera ='$var'
    WHERE boleta = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    if(!$result){
        die('Error de Consulta'.mysqli_error($con));
    }
    echo "Creditos a cubrir: ", $var;
    }

    if(isset($_POST['vara'])) {
    $query  = "SELECT * FROM alu WHERE boleta = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    
    if ($row['carrera']==0){
        echo "positive";
    }}
?>