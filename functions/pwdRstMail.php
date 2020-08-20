<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['pwdRstMl'])){
    require 'db.php';

    $email = $_POST['email'];

    if(empty($email)){
        header('Location:../pwdRst.php?err=empt');exit();
    }else{
        $stmt = mysqli_stmt_init($db);
        $emailCheck = "SELECT email FROM users WHERE email=?";
        if(!mysqli_stmt_prepare($stmt ,$emailCheck)){
            header('Location: ../pwdRst.php?err=dbConn');exit();
        }else{
            mysqli_stmt_bind_param($stmt ,'s',$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt );
            if(mysqli_stmt_num_rows($stmt ) == 1){
                $selector = bin2hex(random_bytes(8));
                $token = random_bytes(32);
                $url='localhost/SavesDesign/pwdRst.php?selector='.$selector.'&validator='.bin2hex($token);
                $expire = date('U') + 300;

                $dltTok = "DELETE FROM pwdreset WHERE email=?";
                mysqli_stmt_prepare($stmt,$dltTok);
                mysqli_stmt_bind_param($stmt,'s',$email);
                mysqli_stmt_execute($stmt);

                $insertTok ="INSERT INTO pwdreset (email,selector,token,expires) VALUES (?,?,?,?);";
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                mysqli_stmt_prepare($stmt,$insertTok);
                mysqli_stmt_bind_param($stmt,'ssss',$email,$selector,$hashedToken,$expire);
                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);
                mysqli_close($db);

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
                $mail->setFrom('NO_REPLY@saves.design', 'Save\'s Design');
                $mail->addAddress($email);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Save\'s Design Password Reset';
                $mail->Body    = '
                    <img style="width:100%" src="http://35.231.143.2/imgs/SavesDesignFeatured.png" alt="Save\'s Design Logo">
                    <div style="text-align:center;">
                        <p style="padding:10px;font-size:18px;font-weight:600;">Follow this link to reset your password:</p>
                        <a href="'.$url.'">Click here!</a>
                    </div>';
                $mail->AltBody = 'Copy and Paste this link into your browser to reset your password at Save\'s Design: '.$url;

                if($mail->send()){
                    header('Location:../pwdRst.php?msg=scs');exit();
                }else{
                    header('Location:../pwdRst.php?err=fail');exit();
                };
            }else{
                header('Location: ../pwdRst.php?err=mail');exit();
            }
        }
    }
    mysqli_close($db);
}else{
    header('Location:../index.php');
}
