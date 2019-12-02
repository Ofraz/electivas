<?php
require "mail/PHPMailer-master/src/Exception.php";
require "mail/PHPMailer-master/src/PHPMailer.php";
require "mail/PHPMailer-master/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$user = $_POST['id'];
$email = $_POST['mail'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$token = $_POST['token'];
$host= $_SERVER['SERVER_NAME'];

$template = file_get_contents('recoverPass.php');
$template = str_replace("{{name}}", $name, $template);
$template = str_replace("{{action_url_2}}", '<b>http://'.$host.'/newPassword.php?key='.$token.'</b>', $template);
$template = str_replace("{{action_url_1}}", 'http://'.$host.'/newPassword.php?key='.$token, $template);
$template = str_replace("{{year}}", date('Y'), $template);
   
     
    $oMail= new PHPMailer();
    $oMail->CharSet = "UTF-8";
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    //$oMail->SMTPDebug = 2; //Alternative to above constant
    $oMail->Username="electivasupiicsa@gmail.com";
    $oMail->Password="2011130598";
    $oMail->setFrom("electivasupiicsa@gmail.com","Electivas UPIICSA");
    $oMail->addAddress("$email","Usuario");
    $oMail->Subject="Recuperacion de Contraseña";
    $oMail->msgHTML($template);
    
    if(!$oMail->send()){
       echo $oMail->ErrorInfo;
    }else{echo "¡Correo enviado! Por favor revisa tu bandeja de entrada. En su defecto, la bandeja de SPAM";}
?>