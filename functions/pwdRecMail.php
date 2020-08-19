<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'saves.design.auto@gmail.com';                     // SMTP username
    $mail->Password   = '(9253kaRakula)';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587 ;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('saves.design@hotmail.com', 'Save\'s Design');
    $mail->addAddress('save92536@gmail.com');     // Add a recipient
    $mail->addReplyTo('saves.design@hotmail.com', 'Save\'s Design');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Save\'s Design Password Recovery ';
    $mail->Body    = '
        <img style="width:100%" src="http://35.231.143.2/imgs/SavesDesignFeatured.png" alt="Save\'s Design Logo">
        <div style="text-align:center;">
            <p style="padding:10px;font-size:18px;font-weight:600;">Follow this link to recover your password:</p>
            <p style="padding:10px;font-size:16px;">Here will be a link!</p>
        </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if($mail->send()){
    header('Location:../index.php?msg=scs');
}else{
    header('Location:../index.php?msg=fail');
}
