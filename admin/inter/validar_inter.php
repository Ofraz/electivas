<?php
    
    include ('../../connect.php');
    $search = $_POST ['search'];
    
    if(!empty($user)) {
        comprobar($user);
  }
    $consult = "SELECT * FROM inter WHERE id_inter Like '$search'";
    $result = mysqli_query($con,$consult);
    $row = mysqli_num_rows($result);
    
    if ($row != 0){
        echo "No disponible.";    
    }else{echo "Disponible.";} 
?>