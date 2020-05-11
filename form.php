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

  
if(       
           isset($_POST['weight']) 
	&& isset($_POST['height'])
	&& isset($_POST['water'])
	&& isset($_POST['breakfast'])
	&& isset($_POST['lunch'])
	&& isset($_POST['dinner'])
	&& isset($_POST['snack'])
	){
        
        
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$water = $_POST['water'];
	$breakfast= $_POST['breakfast'];
	$lunch = $_POST['lunch'];
	$dinner = $_POST['dinner'];
	$snack = $_POST['snack'];
 


		require("config.php");
		$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
		try {
			$db = new PDO($connection_string, $dbuser, $dbpass);
			$stmt = $db->prepare("INSERT INTO `Info`
							(weight, height, water, breakfast, lunch, dinner, snack, user_id) VALUES
							(:weight, :height, :water, :breakfast, :lunch, :dinner, :snack, :user_id)");
			
			$params = array(
                                     
                                     ":weight"=> $weight, 
						":height"=> $height,
                        ":water"=> $water,
                        ":breakfast"=> $breakfast,
                        ":lunch"=> $lunch,
                        ":dinner"=> $dinner,
                        ":snack"=> $snack,
                        ":user_id"=>$user_id
					);
			$stmt->execute($params);
			echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
	
                die(header("Location: track.php"));


}
       
		catch(Exception $e){
			echo $e->getMessage();
			exit();

		}
	}
 

?>

			
                      
<html>
      	<head>
              	<title>Nutrition App</title>
                <h1 style="font-size:40px;">Nutrition</h1>
                <style>
                body{
                        color: black;
                }
                </style>
        </head>
<br>
        <body onload="findFormsOnLoad();">
               
                <form name="regform" id="myForm" method="POST"
                                        onsubmit="return doValidations(this)">
                        <div>


                             	<label for="weight">Weight: </label><br>
                                <input type="weight" id="weight" name="weight" placeholder="Enter Weight"/>

                        </div>
                        <div>
                             	<label for="height">Height: </label><br>
                                <input type="height" id="height" name="height" placeholder="Enter Height"/>
                        </div>
                        <div>
                             	<label for="water">Water: </label><br>
                                <input type="water" id="water" name="water" placeholder="Enter Cups Of Water"/>
                        </div>
                        <div>
                             	<label for="breakfast">Breakfast: </label><br>
                                <input type="breakfast" id="breakfast" name="breakfast" placeholder="Enter Breakfast"/>
	 </div>
                        <div>
                             	<label for="lunch">Lunch: </label><br>
                                <input type="lunch" id="lunch" name="lunch" placeholder="Enter Lunch"/>
                        </div>
                        <div>
                             	<label for="dinner">Dinner: </label><br>
                                <input type="dinner" id="dinner" name="dinner" placeholder="Enter Dinner"/>
                        </div>
                        <div>
                             	<label for="snack">Snack: </label><br>
                                <input type="snack" id="snack" name="snack" placeholder="Enter Snack"/>
                        </div>
                        <div>

                             	<div>&nbsp;</div>
                                <input type="submit" name="submit" value="Submit"/>

                        </div>

                </form>
<?php if(isset($msg)):?>
                        <span><?php echo $msg;?></span>
                <?php endif;?>
        </body>
</html>




