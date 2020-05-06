<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<?php

if(   	isset($_GET['meal_id'])){
$meal_id= $_GET['meal_id'];
if(!isset($_SESSION["user"])){
        $user_id = 9;
}
else{
     	$user_id = $_SESSION["user"]["id"];
}
//if($_GET['page']){
        require("config.php");
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

        try {
                        $db = new PDO($connection_string, $dbuser, $dbpass);
                        $stmt = $db->prepare("INSERT INTO `Favorites`
                                                        (user_id, meal_id) VALUES
                                                        (:user_id, :meal_id)");


      $params = array(
                                     ":user_id"=> $user_id,
                                                ":meal_id"=> $meal_id
                                          
                                        );
                        $stmt->execute($params);
                        echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
                        echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
                }
                catch(Exception $e){
                        echo $e->getMessage();
                        exit();
                }
        
//$stmt->execute($params);
                                //TODO check that it worked
                                //redirect to a page?
                               die(header("Location: list.php?page=Favorites"));
               
}
?>




?>
<?php foreach($results as $Favorite):?>
        <div>
             	<div><?php echo $Favorite['breakfast'];?></div>
                <div><?php echo $Favorite['lunch'];?></div>
                <div><?php echo $Favorite['dinner'];?></div>
       <div><?php echo $Favorite['snack'];?></div>
  </div>

<?php endforeach;?>

