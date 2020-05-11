<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_SESSION["user"])){
        $user_id=9;

}
else{
     	$user_id=$_SESSION["user"]["id"];
}
require("config.php");
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                try {
                     	$db = new PDO($connection_string, $dbuser, $dbpass);

}
catch(Exception $e){
	echo $e->getMessage();
                        exit();

}
if(isset($_GET['meal_id'])){
    $id=$_GET['meal_id'];
}
if(isset($_POST['edited'])){
    $result= $_POST;
   //echo var_export($result, true);
    $user_id=$_SESSION['user']['id'];
    $stmt=$db->prepare("UPDATE Info set weight=:weight, height=:height, water=:water, breakfast=:breakfast, lunch=:lunch, dinner=:dinner, snack=:snack where id=:id");
    $p= array(//":user_id"=> $user_id,
              ":weight"=> $result['weight'],
              ":height"=> $result['height'],
              ":water"=> $result['water'],
              ":breakfast"=> $result['breakfast'],
              ":lunch"=> $result['lunch'],
              ":dinner"=> $result['dinner'],
              ":snack"=> $result['snack'],
              ":id"=>$id
          );
    $r= $stmt->execute($p);
//echo var_export($stmt->errorInfo(), true);
    if($r>0){
        echo "Saved Successfully";
    }
    else{
        echo "Failed to Save";

    }
    }

    if(isset($_GET['meal_id'])){
    $id=$_GET['meal_id'];
    $stmt= $db->prepare("SELECT * from Info where id=:id");
    $r= $stmt->execute(array(":id"=>$id));
    $result= $stmt->fetch(PDO::FETCH_ASSOC);
//echo var_export($result, true);
//echo var_export($stmt->errorInfo(), true);
}
?>
    

<form method="POST">
    <input type="text" name="weight" value="<?php echo $result['weight'];?>"/>
    <input type="text" name="height" value="<?php echo $result['height'];?>"/>
   <input type="text" name="water" value="<?php echo $result['water'];?>"/>
    <input type="text" name="breakfast" value="<?php echo $result['breakfast'];?>"/>
    <input type="text" name="lunch" value="<?php echo $result['lunch'];?>"/>
    <input type="text" name="dinner" value="<?php echo $result['dinner'];?>"/>
    <input type="text" name="snack" value="<?php echo $result['snack'];?>"/>
    <input type="submit" name="edited" value="Save"/>
</form>




