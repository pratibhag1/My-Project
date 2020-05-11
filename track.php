<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(        isset($_POST['calories'])
        && isset($_POST['protein'])
        && isset($_POST['carbohydrates'])
        && isset($_POST['fiber'])
        && isset($_POST['sugar'])
        && isset($_POST['fat'])
        && isset($_POST['cholesterol'])
        && isset($_POST['sodium'])
        && isset($_POST['potassium'])
        && isset($_POST['vitamina'])
        && isset($_POST['vitaminc'])
        && isset($_POST['calcium'])
        && isset($_POST['iron'])
        ){

	$calories = $_POST['calories'];
        $protein = $_POST['protein'];
        $carbohydrates = $_POST['carbohydrates'];
        $fiber= $_POST['fiber'];
        $sugar = $_POST['sugar'];
        $fat = $_POST['fat'];
        $cholesterol = $_POST['cholesterol'];
        $sodium = $_POST['sodium'];
        $potassium = $_POST['potassium'];
        $vitamina = $_POST['vitamina'];
        $vitaminc = $_POST['vitaminc'];
        $calcium = $_POST['calcium'];
        $iron = $_POST['iron'];


                
$user_id=$_SESSION['user']['id'];
                require("config.php");
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                try {
                        $db = new PDO($connection_string, $dbuser, $dbpass);
                        $stmt = $db->prepare("INSERT INTO `Track`
                                                        (user_id,calories, protein, carbohydrates, fiber, sugar, fat, cholesterol, sodium, potassium, vitamina, vitaminc, calcium, iron) VALUES
                                                        (:user_id, :calories, :protein, :carbohydrates, :fiber, :sugar, :fat, :cholesterol, :sodium, :potassium, :vitamina, :vitaminc, :calcium, :iron)");

                        $params = array(
                        ":user_id"=> $user_id,
                                     ":calories"=> $calories,
                                                ":protein"=> $protein,
                        ":carbohydrates"=> $carbohydrates,
                        ":fiber"=> $fiber,
                        ":sugar"=> $sugar,
                        ":fat"=> $fat,
                        ":cholesterol"=> $cholesterol,
                        ":sodium"=> $sodium,
                        ":potassium"=> $potassium,
                        ":vitamina"=> $vitamina,
                        ":vitaminc"=> $vitaminc,
                        ":calcium"=> $calcium,
                        ":iron"=> $iron
                                        
                                       	);
                        $stmt->execute($params);
                        //echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";

                }
                catch(Exception $e){
                        echo $e->getMessage();
                        exit();
                }
        }


?>
<html>
<head>
                <title>My Project Nutrition</title>
                <h1 style="font-size:40px;">Track Nutrients</h1>
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

                                <label for="calories">Calories: </label><br>
                                <input type="calories" id="calories" name="calories" placeholder="Enter Calories"/>

                        </div>
                        <div>
                                <label for="protein">Protein: </label><br>
                                <input type="protein" id="protein" name="protein" placeholder="Enter Protein in g"/>
                        </div>
                        <div>
                             <label for="carbohydrates">Carbohydrates: </label><br>
                                <input type="carbohydrates" id="carbohydrates" name="carbohydrates" placeholder="Enter Carbohydrates in g"/>
                        </div>
                        <div>
                                <label for="fiber">Fiber: </label><br>
                                <input type="fiber" id="fiber" name="fiber" placeholder="Enter Fiber in g"/>
                        </div>
                        <div>
                                <label for="sugar">Sugar: </label><br>
                                <input type="sugar" id="sugar" name="sugar" placeholder="Enter Sugar in g"/>
                        </div>
                        <div>
                                <label for="fat">Fat: </label><br>
                                <input type="fat" id="fat" name="fat" placeholder="Enter Fat in g"/>
                        </div>
                        <div>
                                <label for="cholesterol">Cholesterol: </label><br>
                                <input type="cholesterol" id="cholesterol" name="cholesterol" placeholder="Enter Cholesterol in mg"/>
                        </div>
                        <div>
                                <label for="sodium">Sodium: </label><br>
                                <input type="sodium" id="sodium" name="sodium" placeholder="Enter Sodium in mg"/>
                        </div>
                        <div>
                                <label for="potassium">Potassium: </label><br>
                                <input type="potassium" id="potassium" name="potassium" placeholder="Enter Potassium in mg"/>
                        </div>
                        <div>
                                <label for="vitamina">Vitamin A: </label><br>
                                <input type="vitamina" id="vitamina" name="vitamina" placeholder="Enter Vitamin A in mcg"/>
                        </div>
                        <div>
                                <label for="vitaminc">Vitamin C: </label><br>
                                <input type="vitaminc" id="vitaminc" name="vitaminc" placeholder="Enter Vitamin C in mg"/>
                        </div>
                        <div>
                                <label for="calcium">Calcium: </label><br>
                                <input type="calcium" id="calcium" name="calcium" placeholder="Enter Calcium in g"/>
                        </div>
                        <div>
                                <label for="iron">Iron: </label><br>
                                <input type="iron" id="iron" name="iron" placeholder="Enter Iron in mcg"/>
                        </div>
                        <div>
                                <div>&nbsp;</div>
                                <input type="submit" value="Submit"/>
                        </div>
                </form>


                <?php if(isset($msg)):?>
                    <span><?php echo $msg;?></span>
                <?php endif;?>
        </body>
</html>

