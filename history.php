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
                <h1 style="font-size:40px;">History of Entries</h1>
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

$stmt= $db->prepare("SELECT * from Info where user_id=:id");
$r=$stmt->execute(
        array(":id"=>$user_id)
);

$Inforesults=$stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt= $db->prepare("SELECT * from Track where user_id=:id");
$r=$stmt->execute(
        array(":id"=>$user_id)
);

$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class= "container">
<div class= "row">
<div class= "col">
<?php foreach($Inforesults as $Info):?>
        
                <div><b>Weight: </b><?php echo $Info['weight'];?></div>
                <div><b>Height: </b><?php echo $Info['height'];?></div>
                <div><b>Cups of Water: </b><?php echo $Info['water'];?></div>
             	<div><b>Breakfast: </b><?php echo $Info['breakfast'];?></div>
                <div><b>Lunch: </b><?php echo $Info['lunch'];?></div>
                <div><b>Dinner: </b><?php echo $Info['dinner'];?></div>
                <div><b>Snack: </b><?php echo $Info['snack'];?></div><br>
                
        
<?php endforeach;?>
</div>
<div class= "col">
<?php foreach($results as $Track):?>
        
             	<div><b>Calories: </b><?php echo $Track['calories'];?></div>
                <div><b>Protein: </b><?php echo $Track['protein'];?></div>
                <div><b>Carbohydrates: </b><?php echo $Track['carbohydrates'];?></div>
                <div><b>Fiber: </b><?php echo $Track['fiber'];?></div>
                <div><b>Sugar: </b><?php echo $Track['sugar'];?></div>
                <div><b>Fat: </b><?php echo $Track['fat'];?></div>
                <div><b>Cholesterol: </b><?php echo $Track['cholesterol'];?></div>
                <div><b>Sodium: </b><?php echo $Track['sodium'];?></div>
                <div><b>Potassium: </b><?php echo $Track['potassium'];?></div>
                <div><b>Vitamin A: </b><?php echo $Track['vitamina'];?></div>
                <div><b>Vitamin C: </b><?php echo $Track['vitaminc'];?></div>
                <div><b>Calcium: </b><?php echo $Track['calcium'];?></div>
                <div><b>Iron: </b><?php echo $Track['iron'];?></div><br>

        

<?php endforeach;?>



