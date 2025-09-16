<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP; // Only if you are using SMTP

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php'; // Only if you are using SMTP
    
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    // $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; //'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = '465';//587; //465;
    $mail->Username = "theronclintwilliam@gmail.com";
    $mail->Password = "nnomfixqjzlawbid";

    $mail->SMTPDebug = 2;

    $mail->setFrom('theronclintwilliam@gmail.com', 'Clint Theron');
    $mail->addAddress('iclipsvideo@gmail.com', 'Recipient Name');

    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email.';

    try {
        $mail->send();
        echo 'Message sent!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }