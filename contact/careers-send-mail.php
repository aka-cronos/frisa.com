<?php
header('Content-type: text/plain; charset=utf-8');

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
$mail->setFrom('rh@frisa.com', 'Careers Form');

$mail->addAddress('rh@frisa.com');

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
  header('Location: error.php?back=careers' . $mail->ErrorInfo );
} else {
  header('Location: success.php?back=careers' );
}

?>
