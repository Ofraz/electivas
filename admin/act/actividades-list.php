<?php
    include('../../connect.php');

    $query = "SELECT activid.id_act, activid.name_act,activid.description,
    activid.cupo, activid.disp, activid.cred_act, 
    concat(inter.name_inter,' ',inter.ap_inter) AS intermed FROM activid 
    INNER JOIN inter ON activid.id_inter = inter.id_inter 
    WHERE activid.id_act NOT LIKE ''
    OR activid.name_act NOT LIKE ''
    OR activid.description NOT LIKE ''
    OR activid.cupo NOT LIKE ''
    OR activid.disp NOT LIKE ''
    OR activid.cred_act NOT LIKE ''
    OR inter.name_inter NOT LIKE ''
    OR inter.ap_inter NOT LIKE ''";
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
            'cupo'=>$row['cupo'],
            'disp'=>$row['disp'],
            'cred_act'=>$row['cred_act'],
            'id_inter' =>$row['intermed']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>