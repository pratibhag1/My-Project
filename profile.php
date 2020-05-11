<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
session_start();
if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit();
}
?>
<br>
<?php

session_start();
if(!isset($_SESSION['user'])){
$user = array(
			"id" => "1",
			"email"=>"pg425@njit.edu",
			"roles"=> [],
			"first_name"=>"Pratibha",
			"last_name"=>"Goel"
                         );
$_SESSION['user'] = $user;
}
else{
	$user = $_SESSION['user'];
}
//echo "<pre>" . var_export($user, true) . "</pre>";

if(isset($_REQUEST['saved'])){
	$email = $_POST['email'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$didUpdate = false;
	//validation samples: https://www.w3schools.com/php/php_form_url_email.asp
	if(!empty($email) && $email != $user['email']){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$user['email'] = $email;
			$didUpdate = true;
		}
		else{
			echo "<mark>Invalid email: " . $email . "</mark>";
		}
	}
	if(!empty($fn) &&  $fn != $user['first_name']){
		$user['first_name'] = $fn;
		$didUpdate = true;
	}
	if(!empty($ln) && $ln != $user['last_name']){
		$user['last_name'] = $ln;
		$didUpdate = true;
	}
	if($didUpdate){
		$_SESSION['user'] = $user;

		
		echo "Saved Successfully";
	}
	else{
		echo "No changes to save";
	}
}
?> 

<div>
	<form method="post">
		<div>
			<label for="email">Email: </label>
			<input type="text" id="email" name="email" value="<?php echo $user['email'];?>"/>
		</div>
		<div>
			<label for="fn">First Name: </label>
			<input type="text" id="fn" name="fn" value="<?php echo $user['first_name'];?>"/>
		</div>
		<div>
			<label for="ln">Last Name: </label>
			<input type="text" id="ln" name="ln" value="<?php echo $user['last_name'];?>"/>
		</div>
		<div>
			<input type="submit" value="Save" name="saved"/>
		</div>
	</form>
</div>
