<?php
include("navbar.php");
echo "<body style='background-color:lightgray'>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Nutrition App</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>

<header>
<br>
</header>
<section>
  <nav>
<br style="line-height:5;"><br>
<br>
  
    <ul>
      <li><a href="https://web.njit.edu/~pg425/My-Project/Register.php">Click Here To Register</a></li>
<br>
      <li><a href="https://web.njit.edu/~pg425/My-Project/meals.php">View Sample Meals</a></li>
     
    </ul>
  </nav>
  
  <article>
  <br style="line-height:50;"><br>
  <br>

 
    <h1>Nutrition Tracker</h1>
    <br>
    <p>Improve your health by using this app to track your weight, height, calories, and other nutrients.</p>
  <p> Set goals and see how close you are to acheiving them.</p>
   <p> View your past meals and sample meals.</p>
    <p>Create an account today!</p>
  <br style="line-height:50;"><br>
 <br>
  <br>
  <br>
<br>
  <br>
  <br>
 <br>
<br>
  <br>
  
  </article>
</section>

<footer>
  <p style="font-size:160%;">Pratibha Goel</p>
</footer>

</body>
</html>


