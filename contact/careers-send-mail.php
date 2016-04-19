<?php

if (empty($_POST['send'])) {
  header('Location: careers.html');
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

$mail->addAddress('careers@friesa.com');

$mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);

$name = $_POST["name"];
$email = $_POST["mail"];
$phone = $_POST["phone"];
$area = $_POST["area"];
$comments = $_POST["message"];

$mail->Subject = "$name has sent you a message";
$mail->Body = "Nombre: $name<br />Correo: $email<br />Telefono: $phone<br />Area: $area<br />Comentarios: $comments";
$mail->AltBody = "Nombre: $name\nCorreo: $email\nTelefono: $phone\nArea: $area\nComentarios: $comments";

if(!$mail->send()) {
  header('Location: careers.html?error=' . $mail->ErrorInfo );
} else {
  header('Location: careers.html?msg=sent' );
}

?>
