<?php
date_default_timezone_set('Etc/UTC');
require 'phpmailer/PHPMailerAutoload.php';
//$mail -> CharSet = "UTF-8";
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "irfandiricon1993@gmail.com";
$mail->Password = "januari1993";
$mail->SetFrom("irfandiricon1993@gmail.com","noreply");
$mail->Subject = "Test Ya";
$mail->Body = "hello";
$mail->AddAddress("irfandi.ricon@gmail.com");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
