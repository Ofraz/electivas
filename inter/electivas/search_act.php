<?php
    session_start();
    include ('../../connect.php');
    
    $search = $_POST ['search'];

    if(!empty($search)){
        $query = "SELECT activid.id_act, activid.name_act,activid.description,
        activid.cupo, activid.disp, activid.cred_act, activid.id_inter 
        FROM activid 
        INNER JOIN inter ON activid.id_inter = inter.id_inter 
        WHERE activid.id_inter = '$_SESSION[user_id]' AND (
         activid.id_act LIKE '$search%'
        OR activid.name_act LIKE '$search%'
        OR activid.description LIKE '$search%'
        OR activid.cupo LIKE '$search%'
        OR activid.disp LIKE '$search%'
        OR activid.cred_act LIKE '$search%')";
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
                'cupo'=>$row['cupo'],
                'disp'=>$row['disp'],
                'cred_act'=>$row['cred_act']                                 
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{ echo 'SIN RESULTADOS';}
?>