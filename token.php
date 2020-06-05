<?php
include ('connect.php');
    $search = $_POST ['email'];
    echo $search;
    $token = bin2hex(random_bytes(64));
    $query = "UPDATE admin SET token ='$token' WHERE mail = '$search'";
    $result = mysqli_query($con,$query);  
    echo $result;
    if($result<1){
        echo "token agregado AD";
    }else{
        $query = "UPDATE inter SET token ='$token' WHERE mail = '$search'";
        $result1 = mysqli_query($con,$query);
        echo $result1;
        if($result1<1){
            echo "token agregado IN";
        }else{
            $query = "UPDATE alu SET token ='$token' WHERE mail = '$search'";
            $result2 = mysqli_query($con,$query);
            echo $result2;             
            if($result2<1){
                echo "token agregado AL";
            }
        }
    }

?>