<?php
	include_once("config.php");
	include_once("tools.php");
	header('Access-Control-Allow-Origin: *');
	date_default_timezone_set('America/Monterrey');
	error_reporting( 1 );
	//ini_set('display_errors', 1);

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
				case 'login': //expects 2 value, user's ID; returns ID and Enabled's value
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("SELECT id, enabled from users where email = ? and password = ? limit 1 ");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['ErrorDescription'] = $STH->errorInfo();
						$jsonResponse['OkResponse']['Data'] = $STH->fetch();
						echo json_encode ($jsonResponse['OkResponse']);
						
						$STH = $DBH->prepare("UPDATE users set lastlogin = NOW() where email = ? and password = ?");
						$STH->execute($data);
						
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
					
				case 'recover': //expects 1 value, user's email
					$data = explode("|",$TransmitedData);
					$NewPassword = generateRandomString();
					array_unshift ($data, md5($NewPassword) );
					
					$STH = $DBH->prepare("UPDATE users set password = ? where email = ? limit 1 ");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$data = explode("|",$TransmitedData);
						$STH = $DBH->prepare("select name, email from users where email = ? limit 1 ");
						$STH->setFetchMode(PDO::FETCH_ASSOC);
						try {
							$STH->execute($data);
							$UserDetails = $STH->fetch(PDO::FETCH_ASSOC);
							$emailTpl = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="80%" style="background-color:#F3F3F3; padding:30px;"> <tr style="height: 84px;"> <td align="left" height="100%" valign="top" width="100%" style="background-color:#010203;"> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="left" valign="top"> <a href="http://www.innovasportpicks.com/" target="_blank" style="display:block; height:84px; max-height:84px;"> <img src="http://the.nett.mx/innova/img/header-email.jpg" alt="Innovasport Picks" style="max-width:320px; height:auto; border:0; font-family: Helvetica Neue; margin:0; padding:0;"> </a> </td> </tr> </table> </td> </tr> <tr> <td align="left" height="100%" valign="top" width="100%" style="font-family: Helvetica Neue;  font-size: 16px; line-height: 22px; max-width:660px; background-color:#FFFFFF; color: #434343; padding:30px; border-top:2px solid #F3F3F3;"> <!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="660"> <tr> <td align="left" valign="top" width="660"> <![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;"> <tr> <td align="left" valign="top"> <p style="font-size: 18px;">Hola <strong id="user-name">'.explode("$",$UserDetails['name'])[0].' '.explode("$",$UserDetails['name'])[1].'</strong>,</p> <p>Hemos recibido una solicitud para resetear tu contraseña desde el sitio de <a href="http://www.innovasportpicks.com" target="_blank" style="color: #1C89C8;">www.innovasportpicks.com</a></p> <p>Tu nueva contraseña es: <strong id="user-password" style="color: #1C89C8;">'.$NewPassword.'</strong></p> <p>Te sugerimos cambiarla cuanto antes desde la sección de “Mi Perfil”.</p> <p>Ir a <a href="http://www.innovasportpicks.com" target="_blank" style="color: #1C89C8;">www.innovasportpicks.com</a></p> <p style="font-size: 18px; color: #D92223;"><strong>Happy Picks!</strong></p> <p><strong>Innovasport Picks Team</strong></p> </td> </tr> </table> <!--[if mso]> </td> </tr> </table> <![endif]--> </td> </tr> </table>';
							// Swift Mailer Library
							require_once 'exttools/swiftmailer/swift_required.php';

							$pEmailGmail = 'innovasport@nett.mx';
							$pPasswordGmail = 'WeAreNett.!!';
							$pFromName = 'Innovasport Picks';

							$pTo = $UserDetails['email']; //destination email
							$pSubjetc = "Nueva contrasena"; //the subjetc 

							$transport = Swift_SmtpTransport::newInstance('smtp.googlemail.com', 465, 'ssl')
										->setUsername($pEmailGmail)
										->setPassword($pPasswordGmail);

							$mMailer = Swift_Mailer::newInstance($transport);

							$mEmail = Swift_Message::newInstance();
							$mEmail->setSubject("Nueva contrasena");
							$mEmail->setTo($pTo);
							$mEmail->setFrom(array($pEmailGmail => $pFromName));
							$mEmail->setBody($emailTpl, 'text/html');

							if($mMailer->send($mEmail) == 1){
								$jsonResponse['OkResponse']['ErrorDescription'] = "OK";
								$jsonResponse['OkResponse']['Data'] = "Email sent, password changed";
								echo json_encode ($jsonResponse['OkResponse']);
								die();
							} else {
								$jsonResponse['ErrorResponse']['Data'] = "Email not sent, password changed.";
								echo json_encode ($jsonResponse['ErrorResponse']);
								die();
							}
						}
						catch (PDOException $e) {
							$jsonResponse['ErrorResponse']['Data'] = 'select '.$e->getMessage();
							echo json_encode ($jsonResponse['ErrorResponse']);
							die();
						}
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
				case 'setloginstring':	// expects 1 values, userID can't be duplicated
					$data = explode("|",$TransmitedData);
					$loginString = generateRandomString(50);
					array_push($data,$loginString);
					$STH = $DBH->prepare("INSERT INTO loginstrings (userID, loginString) values (?, ?)  ON DUPLICATE KEY UPDATE loginString = VALUES(loginString)");
				
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['Data'] = "OK|".$loginString;
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
				
				case 'getloginstring':	// expects 1 values, user's ID
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("SELECT loginString FROM loginstrings  WHERE userID = ?");
				
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['ErrorDescription'] = $STH->errorInfo();
						$jsonResponse['OkResponse']['Data'] = $STH->fetch();
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