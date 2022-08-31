<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../resources/uglymephpmailer/src/ExCeption.php';
require '../resources/uglymephpmailer/src/PHPMailer.php';
require '../resources/uglymephpmailer/src/SMTP.php';

print_r($_REQUEST);

$email=$_POST["emailAddress"];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'charleneantivo19@gmail.com';             // SMTP username
    // $mail->Password = 'coffeeandcharlene';                           // SMTP password
    // $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    // $mail->Port = 587;                                    // TCP port to connect to

    $mail->isSMTP();                                     
    $mail->Host = 'smtp.gmail.com';                      
    $mail->SMTPAuth = true;                             
    $mail->Username = 'antivocha25@gmail.com';     
    $mail->Password = 'bjasdifgfmnwfany';             
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );                         
    $mail->SMTPSecure = 'ssl';                           
    $mail->Port = 465;                                   

    
    //Recipients
    $mail->setFrom('antivocha25@gmail.com', 'CAES');          //This is the email your form sends From
    $mail->addAddress($email,'coco'); // Add a recipient address
    //$mail->addAddress('contact@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Subject line goes here';
    $mail->Body    = 'Body text goes here';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>