<?php
include ('connect.php');

  $email=$_POST['email'];
  $pass=$_POST['password'];
  $select="UPDATE admin SET token = 0, password='$pass' WHERE mail='$email'";
  $result = mysqli_query($con,$select);
  if($result<1){
    echo"admin";
  }else{
    $select="UPDATE inter SET token = 0, password='$pass' WHERE mail='$email'";
      $result = mysqli_query($con,$select);
      if($result<1){
        echo" inter";
      }else{
        $select="UPDATE alu SET token = 0, password='$pass' WHERE mail='$email'";
          $result = mysqli_query($con,$select);
          if($result<1){
            echo" alu";
          }
      }
  }
  //echo"¡Contraseña Actualizada!. Inicie sesión";

  
?>