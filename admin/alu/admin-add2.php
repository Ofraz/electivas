<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $cred = $_POST['cred'];
    $user = $_POST['user'];
    
    $query = "UPDATE alu
    SET name_a ='$name',
    ap_a='$last',
    cred = '$cred',
    boleta = '$user'
    WHERE boleta = '$id' ";

    $result = mysqli_query($con, $query);
    if(!$result){
        die('Error de consulta'. mysqli_error($con)); 
    }
    echo"updated!";
?>