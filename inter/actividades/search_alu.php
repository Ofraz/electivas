<?php
    session_start();
    include ('../../connect.php');
    
    $search = $_POST ['search'];

    if(!empty($search)){
        $query = "SELECT alu.boleta, alu.name_a, alu.ap_a, alu_act.id_bol_act
        FROM alu
        INNER JOIN alu_act ON alu.boleta = alu_act.boleta 
       
        WHERE alu_act.id_act = '$id' AND (
         activid.id_act LIKE '$search%'
        OR alu.boleta LIKE '$search%'
        OR alu.name_a LIKE '$search%'
        OR alu.ap_ LIKE '$search%')";
        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error de consulta'. mysqli_error($con)); 
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
                'id_bol_act'=>$row['id_bol_act'],
                'boleta'=>$row['boleta'],
                'name_a'=>$row['name_a'],
                'ap_a'=>$row['ap_a']                                 
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{ echo 'SIN RESULTADOS';}
?>