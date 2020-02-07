<?php

	//localhost
	$host = $GLOBAL['HOST'];
	$dbName = $GLOBAL['DB_NAME'];
	$username = $GLOBAL['DB_USER'];
	$password = $GLOBAL['DB_PASS'];

	//my web
	// $host = 'fdb19.atspace.me';
	// $dbName = '2622103_manga';
	// $username = '2622103_manga';
	// $password = 'Parkboyoung1202';

	$dsn = "mysql:host=$host;dbname=$dbName";

	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);

	try {
		$database = new PDO($dsn, $username, $password, $options);
	} catch (PDOException $e) {
		echo $e->getMessage();
		exit();
	}
?>

