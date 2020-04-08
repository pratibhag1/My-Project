<?php
if(isset($_POST['submit'])){
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $water = $_POST['water'];
  $breakfast = $_POST['breakfast'];
  $lunch = $_POST['lunch'];
  $dinner = $_POST['dinner'];

 $servername = "afsconnect1";
$username = "pg425";
$password = "Marchpg1379$";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

  $sql =mysqli_query($conn, "insert into Info(id,weight,height,water,breakfast,$
  if($sql)){
    echo "Data insterted successfully";

  }

else {
  echo "Failed to insert";
}
}

?>

