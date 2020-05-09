<?php
//this is check_db.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("config.php");


$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4; password= $dbpass";

try{
	$db = new PDO($connection_string,$dbuser, $dbpass);
	echo "Should have connected";
	$stmt = $db->prepare("CREATE TABLE `Info` (
				`id` int auto_increment not null,
				`weight` int not null unique,
				`height` int not null unique,
				`water` varchar(20) not null unique,
				`breakfast` varchar(255) not null unique,
				`lunch` varchar(255) not null unique,
				`dinner` varchar(255) not null unique,
				`snack` varchar(255) not null unique,
				
				PRIMARY KEY (`id`)
				) CHARACTER SET utf8 COLLATE utf8_general_ci"
			);
	$stmt->execute();
	echo var_export($stmt->errorInfo(), true);
}
catch(Exception $e){
	echo $e->getMessage();
	exit("It didn't work");
}

?>
