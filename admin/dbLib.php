<?php
$username = 'u1063074_arkada';
$password = 'qGYF<HSM5-4g.O<*';
session_start();

include_once "module.php";

DEFINE("SECRET_KEY", "LOL");
mb_internal_encoding("UTF-8");

		$connection = new PDO('mysql:host=192.168.137.106;dbname=db1063074_arkadaspb', $username, $password, array(
		PDO::ATTR_PERSISTENT => true));
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $connection->prepare("SET NAMES 'utf8'");
		$stmt->execute();
		
?>