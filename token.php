<?php
include ('connect.php');
    $search = $_POST ['email'];
    $token = bin2hex(random_bytes(64));
    $query = "UPDATE admin SET token ='$token' WHERE mail = '$search'";
    $result = mysqli_query($con,$query);  
    if($result<1){
        echo "token agregado AD";
    }else{
        $query = "UPDATE inter SET token ='$token' WHERE mail = '$search'";
        $result = mysqli_query($con,$query);
        if($result<1){
            echo "token agregado IN";
        }else{
            $query = "UPDATE alu SET token ='$token' WHERE mail = '$search'";
            $result = mysqli_query($con,$query);             
            if($result<1){
                echo "token agregado AL";
            }
        }
    }

?>