<?php
    session_start();
    include ('../../connect.php');
    
    $search = $_POST ['search'];
    $id = $_POST['id'];

    if(!empty($search)){
        $query = "SELECT alu_act.boleta, alu.name_a, alu.ap_a, alu_act.id_act, alu_act.asist
        FROM alu_act
        INNER JOIN alu ON alu_act.boleta = alu.boleta
       
        WHERE alu_act.id_act = '$id' AND (alu_act.boleta LIKE '$search%'
        OR alu.name_a LIKE '$search%'
        OR alu.ap_a LIKE '$search%')";
        $result = mysqli_query($con, $query);
        if(!$result){
            die('Error de consulta'. mysqli_error($con)); 
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] =array(
               // 'id_bol_act'=>$row['id_bol_act'],
                'boleta'=>$row['boleta'],
                'name_a'=>$row['name_a'],
                'ap_a'=>$row['ap_a'],
                'carrera'=>$row['asist']                                 
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{ echo 'SIN RESULTADOS';}
?>