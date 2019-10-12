<?php
    include('../../connect.php');

    $query = "SELECT * FROM alu WHERE boleta NOT LIKE ''
    OR name_a NOT LIKE ''
    OR ap_a NOT LIKE ''
    OR password NOT LIKE ''
    OR cred NOT LIKE ''";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die('Consulta Fallida'.mysqli_error($con));
        $query = "SELECT * FROM alu";
        $result = mysqli_query($con, $query);
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'boleta' =>$row['boleta'],
            'name_a'=>$row['name_a'],
            'ap_a'=>$row['ap_a'],
            'cred'=>$row['cred']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>