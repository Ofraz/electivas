<?php
    include('../../connect.php');

    $id = $_POST['id'];
    $query = "SELECT * FROM alu WHERE boleta = '$id'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        die('Consulta fallida');
    }

    $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
            'boleta' =>$row['boleta'],
            'name_a'=>$row['name_a'],
            'ap_a'=>$row['ap_a'],
            'cred'=>$row['cred']                                   
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
?>