<?php
header('Content-type: text/plain; charset=utf-8');

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
$mail->setFrom('supply@frisa.com', 'Suppliers Relations Form');

$mail->addAddress('supply@frisa.com');

$name = $_POST["name"];
$email = $_POST["mail"];
$service = $_POST["service"];
$comments = $_POST["message"];

$mail->Subject = "$name has sent you a message";
$mail->Body = "Nombre: $name<br />Correo: $email<br />Servicio: $service<br />Comentarios: $comments";
$mail->AltBody = "Nombre: $name\nCorreo: $email\nServicio: $service\nComentarios: $comments";

if(!$mail->send()) {
  header('Location: error.php?back=suppliers-relations' . $mail->ErrorInfo );
} else {
  header('Location: success.php?back=suppliers-relations' );
}

?>
