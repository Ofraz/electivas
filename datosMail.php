<?php
include ('connect.php');
    $search = $_POST ['email'];
    
    $consult = "SELECT * FROM admin WHERE mail = '$search'";
    $result = mysqli_query($con,$consult);
    $row = mysqli_fetch_array($result);
    if($row!=0){
        $json = array(
                'id' =>$row['id_admin'],
                'name'=>$row['name'],
                'ap'=>$row['ap'],
                'pass'=>$row['password'],
                'mail'=>$row['mail'],
                'token'=>$row['token']
            );
        $jsonstring = json_encode($json, JSON_UNESCAPED_UNICODE);
        echo $jsonstring;
    }else{
        $consult = "SELECT * FROM inter WHERE mail = '$search'";
        $result = mysqli_query($con,$consult);
        $row = mysqli_fetch_array($result);
        if($row!=0){
            $json = array(
                    'id' =>$row['id_inter'],
                    'name'=>$row['name_inter'],
                    'ap'=>$row['ap_inter'],
                    'pass'=>$row['password'],
                    'mail'=>$row['mail'],
                    'token'=>$row['token']
                );
            $jsonstring = json_encode($json, JSON_UNESCAPED_UNICODE);
            echo $jsonstring;
        }else{
            $consult = "SELECT * FROM alu WHERE mail = '$search'";
            $result = mysqli_query($con,$consult);
            $row = mysqli_fetch_array($result);
            if($row!=0){
                $json = array(
                        'id' =>$row['boleta'],
                        'name'=>$row['name_a'],
                        'ap'=>$row['ap_a'],
                        'pass'=>$row['password'],
                        'mail'=>$row['mail'],
                        'token'=>$row['token']
                    );
                $jsonstring = json_encode($json, JSON_UNESCAPED_UNICODE);
                echo $jsonstring;
            }
        }
    }

?>