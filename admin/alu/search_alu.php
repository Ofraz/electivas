<?php
    include('../../connect.php');

    $search = $_POST ['search'];

    
        $query = "SELECT * FROM alu WHERE name_a  LIKE '$search%'
        OR ap_a  LIKE '$search%'
        OR cred  LIKE '$search%'
        OR boleta  LIKE '$search%'";
        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error de consulta'. mysqli_error($con)); 
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
        $jsonstring = json_encode($json);
        echo $jsonstring;
    
?>