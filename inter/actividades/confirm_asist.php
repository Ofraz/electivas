<?php
include ('../../connect.php');
$res = $_POST['vals'];
$id = $_POST['id'];

$query = "UPDATE alu_act SET asist = ( 
    CASE 
        WHEN id_act = $id AND boleta IN ($res) THEN 1 
        WHEN id_act = $id AND boleta NOT IN ($res) THEN 0
    END)";

echo ' ';


/*
    UPDATE alu_act SET asist = ( 
    CASE 
        WHEN id_act =3 AND boleta IN (20000) THEN 1 
        WHEN id_act =3 AND boleta NOT IN (20000) THEN 0
    END)

if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}
}*/
?>