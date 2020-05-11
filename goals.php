<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<html>
<head>
                <title>Nutrition App</title>
                 <h1 style="font-size:40px;">Goals</h1>
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


                             	<label for="currentweight">Current Weight: </label><br>
                                <input type="currentweight" id="currentweight" name="currentweight" placeholder="Enter Current Weight"/>

                         <div>
                              	<label for="goalweight">Goal Weight: </label><br>
                                <input type="goalweight" id="goalweight" name="goalweight" placeholder="Enter Goal Weight"/>
                        </div>
                        <div>
                        <br>
                        </br>                           
                        </div>

                              	<label for="currentheight">Current Height: </label><br>
                                <input type="currentheight" id="currentheight" name="currentheight" placeholder="Enter Current Height"/>

                         <div>
                              	<label for="goalheight">Goal Height: </label><br>
                                <input type="goalheight" id="goalheight" name="goalheight" placeholder="Enter Goal Height"/>
                        </div>
                        <div>
                        <br>
                        </br>
                        </div>

                                <label for="calorieseaten">Calories Eaten: </label><br>
                                <input type="calorieseaten" id="calorieseaten" name="calorieseaten" placeholder="Enter Calories Eaten"/>
                        <div>
                                <label for="goalamount">Goal Amount: </label><br>
                       	       	<input type="goalamount" id="goalamount" name="goalamount" placeholder="Enter Goal Amount"/>

                        <div>

                            <div>&nbsp;</div>
                            <input type="submit" value="Submit"/>
                        </div>

                </form>

<br>          
      <?php if(isset($msg)):?>

                    <span><?php echo $msg;?></span>
                <?php endif;?>
        </body>
</html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(        isset($_POST['currentweight'])
        && isset($_POST['goalweight'])
        && isset($_POST['currentheight'])
        && isset($_POST['goalheight'])
        && isset($_POST['calorieseaten'])
        && isset($_POST['goalamount'])
        ){


        $currentweight = $_POST['currentweight'];
	$currentweight = $_POST['currentweight'];
        $goalweight = $_POST['goalweight'];
        $currentheight = $_POST['currentheight'];
        $goalheight = $_POST['goalheight'];
        $calorieseaten = $_POST['calorieseaten'];
        $goalamount = $_POST['goalamount'];

               
                require("config.php");
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                try {

                        $db = new PDO($connection_string, $dbuser, $dbpass);


                        $stmt = $db->prepare("INSERT INTO `Goals`
                                                        (currentweight, goalweight, currentheight, goalheight, calorieseaten, goalamount) VALUES
                                                        (:currentweight, :goalweight, :currentheight, :goalheight, :calorieseaten, :goalamount)");

                        $params = array(
                                     ":currentweight"=> $currentweight,
                                     ":goalweight"=> $goalweight,
                                     ":currentheight"=> $currentheight,
                                     ":goalheight"=> $goalheight,
                                     ":calorieseaten"=> $calorieseaten,
                                     ":goalamount"=> $goalamount

                        
                                        );
                        $stmt->execute($params);
                       //echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
                }



                catch(Exception $e){
                        echo $e->getMessage();
                        exit();
                }

          

                $result= (-($goalweight-$currentweight)/$goalweight)*100;

                echo "Weight: " .  $result . "% change";


                echo "<br>";

                $result= (-($goalheight-$currentheight)/$goalheight)*100;

                echo "Height: " . $result . "% change";

                echo "<br>";
                $result= ($goalamount-$calorieseaten);


                echo "Calories: " . $result . " calories left";

        }

?>

