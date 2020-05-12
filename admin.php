<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>

<?php
require("config.php");
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";



$is_admin = in_array("Admin", $_SESSION['user']['roles']);
if($isAdmin) { 
 "ok";
}
else{
   die(header("Location: login.php"));
}

return new User(
                        $result['id'],
                        $result['username'],
                        $result['email'],
                        $results//roles if any
                    );

?>



