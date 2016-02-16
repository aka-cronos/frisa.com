<?php
	/** 
	 * WS config file
	 * @author Luis Alcaraz
	 * @version 1.0
	 */

	define("dataenvironment","Development");			// Global constant for DB connection parameters
	define("ownserver","frisa.com");	// Allow Origin for WS

	// Defines connection parameters for PDO database connections.
	$connectionParameters = array(
		"Development" => array(
			"dbtype" => "mysql",
			"dbname" => "tonico_frisa_com",
			"dbhost" => "localhost",
			"dbuser" => "root",
			"dbpass" => ""),
		"Production" => array(
			"dbtype" => "",
			"dbname" => "",
			"dbhost" => "",
			"dbuser" => "",
			"dbpass" => "")
	);

	// Defines multiple keyaccess to validate authorization for webservice usages.
	$Allowed_KeyAccess = array(										
		"demo" => "dev only",
	);
	$Blocked_KeyAccess = array(
		"none" => "none",
		"laskdjasdy7i23y72ye7dhasdjndkajse73y4737edhaslkjdndk23y37y783qwydahslaskdhiu2386217312wdsadadqw122ewqsda#" => "production environment",
	);

	// Predefined responses
	$jsonResponse = array(
		"NotDefined"  => array (  
			"Status" => "0",  
			"ErrorNumber" => "E000",  
			"ErrorDescription" => "Not Defined",
			"Data" => ""
			),
		"Unauthorized"  => array (  
			"Status" => "0",  
			"ErrorNumber" => "E001",  
			"ErrorDescription" => "Unauthorized Use",
			"Data" => ""
			),
		"DbConnectionError"  => array (  
			"Status" => "0",  
			"ErrorNumber" => "E002",  
			"ErrorDescription" => "Error connecting to the database",
			"Data" => ""
			),
		"EmptyIncomingData"  => array (  
			"Status" => "1",  
			"ErrorNumber" => "E003",  
			"ErrorDescription" => "Can't send empty info to the web service",
			"Data" => ""
			),
		"ErrorResponse"  => array (  
			"Status" => "2",  
			"ErrorNumber" => "E004",  
			"ErrorDescription" => "Query execution exception",
			"Data" => ""
			),
		"OkResponse"  => array (  
			"Status" => "3",  
			"ErrorNumber" => "E005",  
			"ErrorDescription" => "",
			"Data" => ""
			),
		"CustomResponse"  => array (  
			"Status" => "4",  
			"ErrorNumber" => "E006",  
			"ErrorDescription" => "",
			"Data" => ""
			),
	);
?>
