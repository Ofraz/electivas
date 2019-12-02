<?php
    
    include ('connect.php');
    $search = $_POST ['search'];
    
    $consult = "SELECT id_admin FROM admin WHERE mail LIKE '$search'";
    $result = mysqli_query($con,$consult);
    $row = mysqli_fetch_array($result);
    if ($row != 0){
        echo "No disponible.";
    }else{
        $consult = "SELECT boleta FROM alu WHERE mail LIKE '$search'";
        $result = mysqli_query($con,$consult);
        $row = mysqli_num_rows($result);
        if ($row == 0){
            $consult = "SELECT id_inter FROM inter WHERE mail LIKE '$search'";
            $result = mysqli_query($con,$consult);
            $row = mysqli_num_rows($result);
            if ($row == 0){
                echo "Disponible.";
            }
            else{
                echo "No disponible.";
            }
        }else{
            echo "No disponible.";}        
    }

?>