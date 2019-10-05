<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $query = "SELECT * FROM activid WHERE id_act = '$id'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        die('Consulta fallida').mysqli_error($con);
    }

    $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
            'id_act' =>$row['id_act'],
            'name_act'=>$row['name_act'],
            'description'=>$row['description'],
            'cupo'=>$row['cupo'],
            'cred_act'=>$row['cred_act']                                   
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
?>