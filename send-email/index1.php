<?php
    // error_reporting(-1);
    // ini_set('display_errors', 'On');
    // set_error_handler("var_dump");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP; // Only if you are using SMTP

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php'; // Only if you are using SMTP
    
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        // Server settings
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl'; //'tls'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Mailer = "smtp";
        $mail->Port = '465'; //587; //use port 465 when using SMPTSecure = 'ssl'
        $mail->Username = "theronclintwilliam@gmail.com";
        $mail->Password = "hlbbgeikcposwczj";
        $mail->SMTPDebug = 2;

        // Recipients
        $mail->setFrom('theronclintwilliam@gmail.com', 'Mailer');
        $mail->addAddress('iclipsvideo@gmail.com', 'Clint Theron');     // Add a recipient
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the plain text version of the email content';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }