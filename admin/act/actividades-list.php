<?php
    include('../connect.php');

    $query = "SELECT * FROM activid WHERE id_act NOT LIKE ''
    OR name_act NOT LIKE ''
    OR description NOT LIKE ''
    OR cred_act NOT LIKE ''";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die('Consulta Fallida'.mysqli_error($con));
        $query = "SELECT * FROM activid";
        $result = mysqli_query($con, $query);
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_act' =>$row['id_act'],
            'name_act'=>$row['name_act'],
            'description'=>$row['description'],
            'cred_act'=>$row['cred_act']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

?>