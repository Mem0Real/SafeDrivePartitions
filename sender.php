<?php    
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');

    $email = $_POST['mail'];
    $company_name = $_COOKIE['company'];
    $token = bin2hex(random_bytes(50));
    
    $_SESSION['email'] = $email;
    $_SESSION['token'] = $token;
    $_SESSION['company'] = $_COOKIE['company'];

    $query2 = mysqli_query($db, "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')");

    // Send Mail

    require 'vendor\autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet="UTF-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'juniourmimo@gmail.com';
    $mail->Password = 'legen...dary';

    $mail->From = 'juniourmimo@gmail.com';
    $mail->FromName = 'Safe Drive Partitions';
    $mail->AddAddress($email);
    $mail->AddReplyTo('safedrivepartitions@gmail.com', 'Information');

    $mail->IsHTML(true);
    $mail->Subject    = "Safe Drive Partitions";
    $mail->AltBody    = "<html>Click on the <a href=\"http://localhost/sdp/home.php?token=" .$token. "\"> link </a> to reset your password.</html>";
    $mail->Body = 
    '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

            <html xmlns="http://www.w3.org/1999/xhtml">

            <head>

                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

                <title>Forgot Password</title>

                <style>

                    body {

                        background-color: #FFFFFF; padding: 0; margin: 0;

                    }

                </style>

            </head>

            <body style="background-color: #FFFFFF; padding: 0; margin: 0;">

            <table border="0" cellpadding="0" cellspacing="10" height="100%" bgcolor="#FFFFFF" width="100%" style="max-width: 1366px;" id="bodyTable">

                <tr>

                    <td align="center" valign="top">

                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailContainer" style="font-family:Arial; color: #333333;">

                            <!-- Logo -->
                            <tr>

                                <td align="left" valign="top" colspan="2" style="border-bottom: 1px solid #CCCCCC; padding-bottom: 10px; text-align: center;">

                                    <span style="font-size: 25px; font-weight: bold;">Safe Drive Partitions</span>

                                </td>

                            </tr>

                            <!-- Header -->

                            <tr>

                                <td align="left" valign="top" colspan="2" style=" padding: 30px 0 15px 0;">

                                    <span style="font-size: 18px; font-weight: normal;">Dear '.$company_name. ' </span>

                                </td>

                            </tr>

                            <!-- Main body -->
                            <tr>

                                <td align="center" valign="top" colspan="2">

                                    <span style="font-size: 16px; line-height: 2; color: #333333;">

                                        <br/><br/>

                                        We have sent you this email in response to your request to reset your Safe drive partitions account password. 

                                        <br/><br/>

                                        Please click  

                                        <a href="http://localhost/sdp/home.php?token='.$token.'">here </a> to proceed with your password reset.

                                        <br/><br/>

                                        If you need help or you have any other questions, feel free to call 0913085993 .

                                        <br/><br/>

                                    </span>

                                </td>
                            <tr>
                            
                            <!-- Thank You -->
                            <tr>
                                <td align="center" colspan="2" style="padding-top: 4px;">

                                    <span style="font-size: 16px; line-height: 2; color: #333333;">

                                        Thank You!
                                    </span>
                                </td>
                            </tr>

                        </table>

                    </td>

                </tr>

            </table>

            </body>

        </html>
    ';

    if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        header('location: home.php?pending=yes');
    }
    
?>