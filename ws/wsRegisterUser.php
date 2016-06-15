<?php
	include_once("config.php");
	include_once("tools.php");
	header('Access-Control-Allow-Origin: *');
	date_default_timezone_set('America/Monterrey');
	error_reporting( 1 );

	if ( array_key_exists_r($_POST['keyaccess'],$Allowed_KeyAccess) )
	{
		// DB Connection Config
		switch( $connectionParameters[dataenvironment]["dbtype"] )
		{
			case 'mysql':
				$DBH = new PDO('mysql:host=' . $connectionParameters[dataenvironment]["dbhost"] . ';dbname=' . $connectionParameters[dataenvironment]["dbname"], $connectionParameters[dataenvironment]["dbuser"], $connectionParameters[dataenvironment]["dbpass"]);
				break;
			case 'sqlite':
				$DBH = new PDO("sqlite:"+$connectionParameters[dataenvironment]["dbhost"]); //ie. my/database/path/database.db
				break;
			case 'msssql':
				$DBH = new PDO("'mssql:host=".$connectionParameters[dataenvironment]["dbhost"].";dbname=".$connectionParameters[dataenvironment]["dbname"].",".$connectionParameters[dataenvironment]["dbuser"].",".$connectionParameters[dataenvironment]["dbpass"]."'");
				break;
			case 'sybase':
				$DBH = new PDO("'sybase:host=".$connectionParameters[dataenvironment]["dbhost"].";dbname=".$connectionParameters[dataenvironment]["dbname"].",".$connectionParameters[dataenvironment]["dbuser"].",".$connectionParameters[dataenvironment]["dbpass"]."'");
				break;
		}		
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//Check if connection is ok
		try {
			$DBH->exec("SET CHARACTER SET utf8");
		}
		catch (PDOException $e) {
			$jsonResponse['DbConnectionError']['Data'] = $e->getMessage();
			echo json_encode ($jsonResponse['DbConnectionError']);
			die();
		}

		// Get parameters to variables
		$WsMode = $_POST['mode'];
		$TransmitedData = $_POST['data'];

		// Check if not empty parameters
		if( isset($WsMode) && isset($TransmitedData) && !empty($WsMode) && !empty($TransmitedData) )
		{
			// Both keys contains something
			switch($WsMode)
			{
				case 'insert':	// expects 5 values, email can't be duplicated
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("INSERT INTO users (name, email, password, mailing, enabled) values (?, ?, ?, ?, 1)");
				
					try {
						$STH->execute($data);
						
						
						$emailTpl = '<center> <table border="0" cellpadding="0" cellspacing="0" height="100%" width="80%" style="background-color:#F3F3F3; padding:30px;"> <tr style="height: 84px;"> <td align="left" height="100%" valign="top" width="100%" style="background-color:#010203;"> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="left" valign="top"> <!-- Se podría comentar?? --> <a href="http://www.innovasportpicks.com/" target="_blank" style="display:block; height:84px; max-height:84px;"> <!-- height: 84px; width:auto;  --> <img src="http://the.nett.mx/innova/img/header-email.jpg" alt="Innovasport Picks" style="max-width:320px; height:auto; border:0; font-family: \'Helvetica Neue\'; margin:0; padding:0;"> </a> </td> </tr> </table> </td> </tr> <tr> <td align="left" height="100%" valign="top" width="100%" style="font-family: \'Helvetica Neue\';  font-size: 16px; line-height: 22px; max-width:660px; background-color:#FFFFFF; color: #434343; padding:30px; border-top:2px solid #F3F3F3;"> <!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="660"> <tr> <td align="left" valign="top" width="660"> <![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;"> <tr> <td align="left" valign="top"> <p style="font-size: 18px;">Hola <strong id="user-name">'.explode('$',$data[0])[0].' '.explode('$',$data[0])[1].'</strong>,</p> <p>Gracias por registrarte en Innovasport Picks.</p><p>Puedes entrar con tu correo <strong id="user-mail">'.$data[1].'</strong> y contraseña dada de alta en el siguiente link: <a href="http://www.innovasportpicks.com" target="_blank" style="color: #1C89C8;">www.innovasportpicks.com</a></p> <p>Recuerda que cada semana podrás enviar tus pronósticos, previo al cierre de la jornada. Desde la sección de <strong>“Mis Pronósticos”</strong> y <strong>“Top Ten”</strong> podrás conocer más acerca de tus puntos y las posiciones en la tabla  general.</p> <p style="font-size: 18px; color: #D92223;"><strong>Happy Picks!</strong></p> <p>Conoce cada uno de los premios que puedes ganar <a href="http://www.innovasportpicks.com/" style="color:#1C89C8;">aquí</a>.</p> <p><strong>Innovasport Picks Team</strong></p> </td> </tr> </table> <!--[if mso]> </td> </tr> </table> <![endif]--> </td> </tr> </table> </center>';
						// Swift Mailer Library
						require_once 'exttools/swiftmailer/swift_required.php';

						$pEmailGmail = 'innovasport@nett.mx';
						$pPasswordGmail = 'WeAreNett.!!';
						$pFromName = 'Innovasport Picks';

						$pTo = $data[1]; //destination email

						$transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
									->setUsername($pEmailGmail)
									->setPassword($pPasswordGmail);

						$mMailer = Swift_Mailer::newInstance($transport);

						$mEmail = Swift_Message::newInstance();
						$mEmail->setSubject("Bienvenido a Innovasport Picks");
						$mEmail->setTo($pTo);
						$mEmail->setFrom(array($pEmailGmail => $pFromName));
						$mEmail->setBody($emailTpl, 'text/html');

						$mMailer->send($mEmail);

						
						$jsonResponse['OkResponse']['Data'] = "OK";
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
				case 'activate':	// expects 1 values, user's id.
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("UPDATE users set enabled = 1 where id = ? limit 1");
				
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['Data'] = "OK";
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
				case 'deactivate':	// expects 1 values, user's id.
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("UPDATE users set enabled = 0 where id = ? limit 1");
				
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['Data'] = "OK";
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
				case 'fetchAll': //expects 1 value, enabled (bool))
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("SELECT id, name, email, password, mailing, enabled from users where enabled = ? ");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['ErrorDescription'] = "OK";
						$jsonResponse['OkResponse']['Data'] = $STH->fetchAll();
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
				case 'fetch': //expects 1 value, user's ID
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("SELECT id, name, email, password, mailing, enabled from users where id = ? ");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['ErrorDescription'] = "OK";
						$jsonResponse['OkResponse']['Data'] = $STH->fetchAll();
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
			}
		}
		else {
			// missing stuff
			echo json_encode ($jsonResponse['EmptyIncomingData']);
			exit;
		}

		$DBH = null;
	}
	else if ( array_key_exists_r($_POST['keyaccess'],$Blocked_KeyAccess) )
	{
		$jsonResponse['Unauthorized']['Data'] = 'Key='.$_POST['keyaccess'].';Response='.$Blocked_KeyAccess[ $_POST['keyaccess'] ];
		echo json_encode( $jsonResponse['Unauthorized'] );
	}
	else
	{
		echo json_encode( $jsonResponse['NotDefined'] );
	}
?>
