<?php
require "config.php";
$sql = file_get_contents("data/init.sql");
try {

	$connection = new PDO("mysql:host=$host", $username,$password,$options);
	$sql;
	$connection->exec($sql);
	echo "Database and table users created successfully. ";
}

catch(PDOException $error){
	echo $sql." ".$error->getMessage();

}

