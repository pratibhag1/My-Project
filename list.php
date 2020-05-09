<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<h1>Meals</h1>
<br>
<?php

//"SELECT * FROM Favorites f join Info i ON f.meal_id = i.id where f.user_id = :user and f.meal_id = :meal"  
//in the url you'll have some get variables
//website.com/thispage.php?page=Info
//don't forget to get the user id from session variable
if(!isset($_SESSION["user"])){
	$user_id = 9;
}
else{
	$user_id = $_SESSION["user"]["id"];
}
if($_GET['page']){
	require("config.php");
	$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
	$db = new PDO($connection_string, $dbuser, $dbpass);
	$page = $_GET['page'];
	if($page == "Info"){
		$stmt= $db->prepare("select * FROM Info");
		$params=array(":id"=>$user_id);
	}
	else if($page == "Favorites"){
		$stmt= $db->prepare("select i.* from Info i JOIN Favorites f on i.id = f.meal_id where f.user_id= :id");
		$params=array(":id"=>$user_id);
		
	}
	$r=$stmt->execute($params);
      //echo var_export($stmt->errorInfo());
	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
<?php foreach($results as $Favorite):?>
        <div>
             	<div><b>Breakfast: </b><?php echo $Favorite['breakfast'];?></div>
                <div><b>Lunch: </b><?php echo $Favorite['lunch'];?></div>
                <div><b>Dinner: </b><?php echo $Favorite['dinner'];?></div>
                <div><b>Snack: </b><?php echo $Favorite['snack'];?></div>
				<!-- if clicked we add to our favorites if it doesn't exist,
				if it exists we remove, the label should reflect this
				i.e., if this is fav page, then we'd show unfav, if it's info page we can show fav
				though on info page it's likely the user may have already fav'ed it so we don't want to insert the data twice-->
				<?php if($page == "Info"):?>
				<div><a href="save_favorite.php?meal_id=<?php echo $Favorite['id'];?>">Favorite me</a></div>
				<?php else:?>
				<div><a href="del_favorite.php?meal_id=<?php echo $Favorite['id'];?>">UnFavorite me</a></div>
				<?php endif;?>
<br>
        </div>

<?php endforeach;?>
