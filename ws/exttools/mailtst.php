<?php
$emailTpl = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="80%" style="background-color:#F3F3F3; padding:30px;"> <tr style="height: 84px;"> <td align="left" height="100%" valign="top" width="100%" style="background-color:#010203;"> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="left" valign="top"> <a href="http://www.innovasportpicks.com/" target="_blank" style="display:block; height:84px; max-height:84px;"> <img src="http://the.nett.mx/innova/img/header-email.jpg" alt="Innovasport Picks" style="max-width:320px; height:auto; border:0; font-family: Helvetica Neue; margin:0; padding:0;"> </a> </td> </tr> </table> </td> </tr> <tr> <td align="left" height="100%" valign="top" width="100%" style="font-family: Helvetica Neue;  font-size: 16px; line-height: 22px; max-width:660px; background-color:#FFFFFF; color: #434343; padding:30px; border-top:2px solid #F3F3F3;"> <!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="660"> <tr> <td align="left" valign="top" width="660"> <![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;"> <tr> <td align="left" valign="top"> <p style="font-size: 18px;">Hola <strong id="user-name">'.$data['name'].'</strong>,</p> <p>Hemos recibido una solicitud para resetear tu contraseña desde el sitio de <a href="http://www.innovasportpicks.com" target="_blank" style="color: #1C89C8;">www.innovasportpicks.com</a></p> <p>Tu nueva contraseña es: <strong id="user-password" style="color: #1C89C8;">'.$NewPassword.'</strong></p> <p>Te sugerimos cambiarla cuanto antes desde la sección de “Mi Perfil”.</p> <p>Ir a <a href="http://www.innovasportpicks.com" target="_blank" style="color: #1C89C8;">www.innovasportpicks.com</a></p> <p style="font-size: 18px; color: #D92223;"><strong>Happy Picks!</strong></p> <p><strong>Innovasport Picks Team</strong></p> </td> </tr> </table> <!--[if mso]> </td> </tr> </table> <![endif]--> </td> </tr> </table>';
// Swift Mailer Library
require_once 'swiftmailer/swift_required.php';

$pEmailGmail = 'innovasport@nett.mx';
$pPasswordGmail = 'WeAreNett.!!';
$pFromName = 'Innovasport Picks';

$pTo = 'lalcaraz@gmail.com'; //destination email
$pSubjetc = "Nueva contrasena"; //the subjetc 

$transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
            ->setUsername($pEmailGmail)
            ->setPassword($pPasswordGmail);

$mMailer = Swift_Mailer::newInstance($transport);

$mEmail = Swift_Message::newInstance();
$mEmail->setSubject($pSubjetc);
$mEmail->setTo($pTo);
$mEmail->setFrom(array($pEmailGmail => $pFromName));
$mEmail->setBody($emailTpl, 'text/html');

if($mMailer->send($mEmail) == 1){
    echo 'send ok';
}
else {
    echo 'send error';
}


?>