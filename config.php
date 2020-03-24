<?php

/**
 * Configuration for database connection
 */
//$sql = file_get_contents("data/init.sql");
$host = "localhost";
$username = "root";
$password = "";
$dbname="test";
$dsn = "mysql:host=$host; dbname=$dbname";
$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);