<?php

if (empty($_POST['send'])) {
  header('Location: suppliers-relations.html');
  exit;
}

require '../mailer/config.php';
require '../mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = "$mail_host";
$mail->SMTPAuth = true;
$mail->Username = "$mail_username";
$mail->Password = "$mail_password";
$mail->SMTPSecure = "$mail_security";
$mail->Port = $mail_port;
$mail->setFrom('contact-form@friesa.com', 'Contact Form');

$mail->addAddress('suppliers-relations@friesa.com');

$name = $_POST["name"];
$email = $_POST["mail"];
$service = $_POST["service"];
$comments = $_POST["message"];

$mail->Subject = "$name has sent you a message";
$mail->Body = "Nombre: $name<br />Correo: $email<br />Servicio: $service<br />Comentarios: $comments";
$mail->AltBody = "Nombre: $name\nCorreo: $email\nServicio: $service\nComentarios: $comments";

if(!$mail->send()) {
  header('Location: suppliers-relations.html?error=' . $mail->ErrorInfo );
} else {
  header('Location: suppliers-relations.html?msg=sent' );
}

?>
