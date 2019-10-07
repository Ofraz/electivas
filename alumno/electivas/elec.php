<?php
    session_start();
    include ('../connect.php');

    $query  = "SELECT * FROM alu WHERE Boleta = '$_SESSION[user_id]'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
?>