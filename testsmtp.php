<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = '192.168.2.13';
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->Username = '';
$mail->Password = '';
$mail->setFrom('info@bions.id', 'Info Bions');
$mail->addReplyTo('info@bions.id', 'Info Bions');
$mail->addAddress('embang@gmail.com', 'Embang');
$mail->Subject = 'Testing PHPMailer';
//$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is a plain text message body';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'The email message was sent.';
}
?>