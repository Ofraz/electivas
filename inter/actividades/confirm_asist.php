<?php
include ('../../connect.php');
$search = $_POST ['ident'];
$bol = $_POST['boleta'];

$query = "UPDATE alu_act SET asist = ABS(asist - 1)
WHERE boleta = '$bol' AND id_act = '$search'";
$result = mysqli_query($con, $query);

if(!$result) {
    die('Consulta Fallida'.mysqli_error($con));
}
echo 'actualizado';

?>