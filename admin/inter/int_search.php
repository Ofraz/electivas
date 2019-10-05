<?php
    include('../../connect.php');

    $search = $_POST ['search'];

    
        $query = "SELECT * FROM inter WHERE name_inter  LIKE '$search%'
        OR ap_inter  LIKE '$search%'
        OR id_inter  LIKE '$search%'";
        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error de consulta'. mysqli_error($con)); 
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
                'id_inter' =>$row['id_inter'],
            'name_inter'=>$row['name_inter'],
            'ap_inter'=>$row['ap_inter']                              
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    
?>