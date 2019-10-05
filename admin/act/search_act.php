<?php
    include('../../connect.php');

    $search = $_POST ['search'];

    if(!empty($search)){
        $query = "SELECT * FROM activid WHERE id_act  LIKE '$search%'
        OR name_act  LIKE '$search%'
        OR description  LIKE '$search%'
        OR cred_act  LIKE '$search%'";
        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error de consulta'. mysqli_error($con)); 
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
                'id_act' =>$row['id_act'],
                'name_act'=>$row['name_act'],
                'description'=>$row['description'],
                'cred_act'=>$row['cred_act']                                 
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{ echo 'SIN RESULTADOS';}
?>