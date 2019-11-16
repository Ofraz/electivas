<?php
    session_start();
    include ('../../connect.php');

    $query = "SELECT activid.id_act, activid.name_act,activid.description,
    activid.cupo, activid.cred_act, activid.id_inter 
    FROM activid 
    INNER JOIN inter ON activid.id_inter = inter.id_inter 
    WHERE activid.id_inter = '$_SESSION[user_id]' AND (
    activid.id_act NOT LIKE ''
    OR activid.name_act NOT LIKE ''
    OR activid.description NOT LIKE ''
    OR activid.cupo NOT LIKE ''
    OR activid.cred_act NOT LIKE '')";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die('Consulta Fallida'.mysqli_error($con));
        $query = "SELECT * FROM activid";
        $result = mysqli_query($con, $query);
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'name_act'=>$row['name_act'],
            'description'=>$row['description'],
            'cupo'=>$row['cupo'],
            'cred_act'=>$row['cred_act']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>