<?php
    include('../../connect.php');

    $query = "SELECT * FROM inter WHERE id_inter NOT LIKE ''
    OR name_inter NOT LIKE ''
    OR ap_inter NOT LIKE ''";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die('Consulta Fallida'.mysqli_error($con));
        $query = "SELECT * FROM inter";
        $result = mysqli_query($con, $query);
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_inter' =>$row['id_inter'],
            'name_inter'=>$row['name_inter'],
            'ap_inter'=>$row['ap_inter']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>