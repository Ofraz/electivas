<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $query = "SELECT * FROM inter WHERE id_inter = '$id'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        die('Consulta fallida');
    }

    $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
            'id_inter' =>$row['id_inter'],
            'name_inter'=>$row['name_inter'],
            'ap_inter'=>$row['ap_inter'],                                  
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
?>