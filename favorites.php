<?php
if(!isset($_SESSION["user"])){
	$user_id = 9;
}
else{
	$user_id = $_SESSION["user"]["id"];
}
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['meal_id'])){
        $meal_id = $_GET['meal_id'];


         require("config.php");
         $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
		try {
				$db = new PDO($connection_string, $dbuser, $dbpass);
				$stmt = $db->prepare("INSERT INTO `Favorites`
												(user_id, meal_id) VALUES
												(:user_id, :meal_id)");

				$params = array(
							 ":user_id"=> $user_id,
							 ":meal_id"=> $meal_id);
							 
				$stmt->execute($params);
				//TODO check that it worked
				//redirect to a page?
				die(header("Location: list.php?page=Favorites"));
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
}
?> 

