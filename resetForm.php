<?php
 //Reseteo variables.
 $error = $usuario = NULL;

 //Comprobamos si esta definida el formulario y no es NULL.
if (isset($_POST['email'])) {
    $email= $_POST['email'];
    

    require "mail/PHPMailer-master/src/Exception.php";
    require "mail/PHPMailer-master/src/PHPMailer.php";
    require "mail/PHPMailer-master/src/SMTP.php";
    
    $oMail= new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username="electivasupiicsa@gmail.com";
    $oMail->Password="2011130598";
    $oMail->setFrom("electivasupiicsa@gmail.com","Electivas UPIICSA");
    $oMail->addAddress("$email","RJC Moderador");
    $oMail->Subject="Recuperacion de Contraseña";
    $oMail->msgHTML("¡Hola! parece que haz olvidado tu contraseña, por el momento nos encontramos implementando un método más seguro para reestablecer tu contraseña.
    Sé muy cuidadoso guardando ésta contraseña en un lugar seguro y borra inmediatamente este correo.
    
    Pass: '$pass'");
    
    if(!$oMail->send()){
       echo $oMail->ErrorInfo;
    }else{echo "correo enviado!";}
    
} 
?>