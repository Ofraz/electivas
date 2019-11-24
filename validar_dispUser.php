<?php
    
    include ('connect.php');
    $search = $_POST ['search'];
    
    $consult = "SELECT id_admin FROM admin WHERE id_admin Like '$search' AND password !='0'";
    $result = mysqli_query($con,$consult);
    $row = mysqli_num_rows($result);
    if ($row != 0){
        echo "No disponible.";
    }else{
        $consult = "SELECT boleta FROM alu WHERE boleta like '$search' AND password !='0'";
        $result = mysqli_query($con,$consult);
        $row = mysqli_num_rows($result);
        if ($row == 0){
            $consult = "SELECT id_inter FROM inter WHERE id_inter like '$search' AND password !='0'";
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