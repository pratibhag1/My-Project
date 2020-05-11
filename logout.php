<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>
<br>
<?php
session_start();
session_unset();
session_destroy();
echo "You have been logged out";
//echo var_export($_SESSION, true);

if (ini_get("session.use_cookies")) { 
    $params = session_get_cookie_params(); 
	//clones then destroys since it makes it's lifetime 
	//negative (in the past)
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"] 
    ); 
}
header("Location: login.php"); 
?>
<html>
<body bgcolor="lightgray">
</body>
</html>
