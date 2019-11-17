<?php
    session_start();
    include ('../../connect.php');

    $query = "SELECT activid.id_act, activid.name_act, activid.description,
    activid.cupo, activid.cred_act, 
    concat(inter.name_inter,' ',inter.ap_inter) AS intermed FROM activid 
    JOIN inter ON activid.id_inter = inter.id_inter
    JOIN alu_act ON activid.id_act = alu_act.id_act
    WHERE alu_act.boleta = '$_SESSION[user_id]'";
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
            'cred_act'=>$row['cred_act'],
            'id_inter' =>$row['intermed']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>