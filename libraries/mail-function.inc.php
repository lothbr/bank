<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($to, $username, $subject, $body){
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    // Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com.';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'abrahamolaoluwa3@gmail.com';                 // SMTP username
    $mail->Password = 'monstermash';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
   //  $mail->isSMTP();                                      // Set mailer to use SMTP
   //  $mail->Host = 'smtp.gmail.com.';  // Specify main and backup SMTP servers
   //  $mail->SMTPAuth = true;                               // Enable SMTP authentication
   //  $mail->Username = 'aptechweb2019@gmail.com';                 // SMTP username
   //  $mail->Password = 'aptech2019';                           // SMTP password
   //  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
   //  $mail->Port = 587;    


    //Recipients
    $mail->setFrom('admin@midwestbank.online', 'Midwest Bank');
    $mail->addAddress($to, $username);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('noreply@midwestbank.online', 'Do not reply');
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = "Sorry, your server does not support HTML";

    $mail->send();
    return true;
} 
catch (Exception $e) {
    return false;
}
}

?>
 
