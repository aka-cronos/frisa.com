<?php

if (empty($_POST['send'])) {
  header('Location: request-quote.html');
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

$mail->addAddress('request-quote@friesa.com');

$mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);

$name = $_POST["name"];
$company = $_POST["company"];
$email = $_POST["mail"];
$phone = $_POST["phone"];
$country = $_POST["country"];
$state = $_POST["state"];
$industry = $_POST["industry"];
$product = $_POST["product"];
$comments = $_POST["message"];

$mail->Subject = "$name has sent you a message";
$mail->Body = "Nombre: $name<br />Compañia: $company<br />Correo: $email<br />" .
  "Telefono: $phone<br />Pais: $country<br />state: $state<br />Industria: $industry<br />" .
  "Producto: $product<br />Comentarios: $comments";
$mail->AltBody = "Nombre: $name\nCompañia: $company\nCorreo: $email\n" .
  "Telefono: $phone\nPais: $country\nstate: $state\nIndustria: $industry\n" .
  "Producto: $product\nComentarios: $comments";

if(!$mail->send()) {
  header('Location: request-quote.html?error=' . $mail->ErrorInfo );
} else {
  header('Location: request-quote.html?msg=sent' );
}

?>
