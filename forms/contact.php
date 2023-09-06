<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'Krunalkakadiya1113@gmail.com';                     //SMTP username
  $mail->Password   = 'nfllpcoxuxaemswj';                               //SMTP password
  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('Krunalkakadiya1113@gmail.com', 'Krunal Kakadiya');
  $mail->addAddress('Krunalkakadiya1113@gmail.com', 'Krunal Kakadiya');     //Add a recipient  
  $mail->AltBody = "This is the mail from" . $_POST['email'] . $_POST['name'];


  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $_POST['email'] . ' : ' . $_POST['name'] . "-" . $_POST['subject'];
  $mail->Body    = $_POST['message'];

  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Message has been sent successfully";
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
