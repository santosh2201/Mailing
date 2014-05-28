<?php
require 'lib/mailer/PHPMailerAutoload.php'; 
$email = $_POST["email"]; 
$subject=$_POST["subject"];
$message= $_POST["message"];
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'practosoftware@gmail.com';         // SMTP username
$mail->Password = 'practonsr';               	      // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('practosoftware@gmail.com', 'practo soft');     //Set who the message is to be sent from
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

//TODO change it to your email id for testing purpose. To use it with API change it to $email 
$mail->addAddress('santosh.cool.reddy@gmail.com', '');
$mail->Subject = $subject;
$mail->Body    = $message;
if(!$mail->send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
exit;
}


include 'model/mysql-connect.php';

include 'model/post.php';

