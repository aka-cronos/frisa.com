<?php
	include_once("config.php");
	include_once("tools.php");
	header('Access-Control-Allow-Origin: *');
	date_default_timezone_set('America/Monterrey');
	error_reporting( 1 );
	ini_set('display_errors',1);

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
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_FOUND_ROWS);
		
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
				case 'get': //expects 1 value, user's ID;
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("SELECT id, facebookID, name, email, mailing from users where id=? and enabled = 1 limit 1 ");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['ErrorDescription'] = $DBH->errorInfo();
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
				
				case 'getName': //expects 1 value, user's ID;
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("SELECT name, email from users where id=? and enabled = 1 limit 1 ");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['ErrorDescription'] = $DBH->errorInfo();
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
					
				case 'modifyMailing': //expects 2 value, user's ID;
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("UPDATE users SET mailing = ? where id = ? and password = ?");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						$jsonResponse['OkResponse']['Data'] = 'mailing';
						$jsonResponse['OkResponse']['ErrorDescription'] = $STH->rowCount();
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
					
				case 'modifyMailingFB': //expects 2 value, user's ID;
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("UPDATE users SET mailing = ? where id = ?");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						if ($STH)
							$jsonResponse['OkResponse']['Data'] = "mailing";
						else
							$jsonResponse['OkResponse']['Data'] = "FAILED";
						$jsonResponse['OkResponse']['ErrorDescription'] = $STH->rowCount();
						echo json_encode ($jsonResponse['OkResponse']);
						die();
					}
					catch (PDOException $e) {
						$jsonResponse['ErrorResponse']['Data'] = $e->getMessage();
						echo json_encode ($jsonResponse['ErrorResponse']);
						die();
					}
					break;
					
				case 'modifyPasswordMailing': //expects 4 value, user's ID;
					$data = explode("|",$TransmitedData);
					$STH = $DBH->prepare("UPDATE users SET mailing = ?, password = ? where id = ? and password = ?");
					$STH->setFetchMode(PDO::FETCH_OBJ);
					try {
						$STH->execute($data);
						if ($STH->rowCount())
							$jsonResponse['OkResponse']['Data'] = "OK";
						else
							$jsonResponse['OkResponse']['Data'] = "FAILED";
						$jsonResponse['OkResponse']['ErrorDescription'] = $DBH->errorInfo();
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