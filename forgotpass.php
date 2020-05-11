<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<html>
<head>
                <title>Nutrition App</title>
                 <h1 style="font-size:40px;">Reset Password</h1>
                <style>
                body{

                     	color: black;
                }
                </style>
        </head>

<br>

                 	<form name="loginform" id="myForm" method="POST">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="Enter Email"/>
                        <label for="pass">New Password: </label>
                        <input type="password" id="pass" name="password" placeholder="Enter New Password"/>
                        <label for="conf">Confirm New Password: </label>
                        <input type="password" id="conf" name="confirm" placeholder="Confirm New Password"/>
                        <input type="submit" value="Save"/>
</form>
</body>
</html>
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

if(        isset($_POST['email'])
        && isset($_POST['password'])
        && isset($_POST['confirm'])
        ){
	$pass = $_POST['password'];
        $conf = $_POST['confirm'];
        if($pass == $conf){
                echo "Change successful";
header("Location: login.php");
 }
	else{
             	echo "Change not successful";
                exit();
        }
$pass = password_hash($pass, PASSWORD_BCRYPT);
        echo "<br>$pass<br>";
        
        require("config.php");
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
        try {
                $db = new PDO($connection_string, $dbuser, $dbpass);
                $stmt = $db->prepare("UPDATE Users set password=:password WHERE email=:email");

if(isset($_GET['email'])){
    $id=$_GET['email'];
}
                        
        $email = $_POST['email'];        
        $params = array(":email"=>$email,
        ":password"=> $pass);
        $stmt->execute($params);
        echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
        }
	catch(Exception $e){
                echo $e->getMessage();
                exit();

        }
}

if(isset($_GET['email'])){
    $id=$_GET['email'];
    $stmt= $db->prepare("SELECT * from Users where id=:id");
    $r= $stmt->execute(array(":id"=>$id));
    $result= $stmt->fetch(PDO::FETCH_ASSOC);
echo var_export($result, true);
echo var_export($stmt->errorInfo(), true);
}

?>

