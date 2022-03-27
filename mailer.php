<?php

    $Email = $_SESSION['email'];
    
    require 'vendor\autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet="UTF-8";
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '4453e3f644d8b7';
    $mail->Password = '618bcd08f6d576';

    $mail->From = 'Safedrivepartitions@gmail.com';
    $mail->FromName = 'Safe Drive Partitions';
    $mail->AddAddress('Death@death.com');
    $mail->AddReplyTo('safedrivepartitions@gmail.com', 'Information');

    $mail->IsHTML(true);
    $mail->Subject    = "Safe Drive Partitions";
    $mail->addEmbeddedImage('images/blacksdp.jpg', 'image_cid');
    $mail->msgHTML(file_get_contents('trying.php'), __DIR__);
    $mail->AltBody    = "<html>Click on the <a href=\"http://localhost/sdp/home.php?token=" .$token. "\"> link </a> to reset your password.</html>";
    
    if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    }
?>