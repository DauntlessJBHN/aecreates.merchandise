<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

  $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'workwithaecreates@gmail.com';   //SMTP write your email
    $mail->Password   = 'sdgc pjsv ycjk csqu';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('workwithaecreates@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    //Content
    $name2 = $_POST["name"];
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "INQUIRY from $name2";   // email subject headings
    $mail->Body    = $_POST["message"]; //email message

    // Success sent message alert
    //$mail->send();
$is_local = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1');

if ($is_local) {
    $redirect_url = "/aecreates.online/confirmation";
} else {
    $redirect_url = "/confirmation";
}

    if (!$mail->send()) {
    // Error notification alert
    $error_msg = addslashes($mail->ErrorInfo);
    echo "<script>
            window.location.href = '" . $redirect_url . "';
          </script>";
    exit();
      } else {
          // Success notification alert
          echo "<script>
                  window.location.href = '" . $redirect_url . "';
                </script>";
          exit();
      }
}
?>