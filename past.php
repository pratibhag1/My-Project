<?php
//session_start();
include("navbar.php");
if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit();
}

echo "<body style='background-color:lightgray'>";
?>
<br>
<html>
<head>
                <title>Nutrition App</title>
                <h1 style="font-size:40px;">My Past 3 Meals</h1>
                <style>
                body{
                        color: black;
                }
                </style>
        </head>
</html>

<br>
<?php
$user_id=$_SESSION['user']['id'];
	 require("config.php");
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                
                     	$db = new PDO($connection_string, $dbuser, $dbpass);

$stmt= $db->prepare("SELECT * from Info where user_id=:id order by id desc LIMIT 3");
$r=$stmt->execute(
	array(":id"=>$user_id)
);

$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach($results as $Info):?>

	<div>
		<div><b>Breakfast: </b><?php echo $Info['breakfast'];?></div>
		<div><b>Lunch: </b><?php echo $Info['lunch'];?></div>
		<div><b>Dinner: </b><?php echo $Info['dinner'];?></div>
		<div><b>Snack: </b><?php echo $Info['snack'];?></div>
      <a href= "editform.php?meal_id=<?php echo $Info['id'];?>">Edit</a>
	</div>
<br>
<?php endforeach;?>

