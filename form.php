<form action= "site.php" method="get">
        Log weight: <input type="number" name="weight">
       
        <br>
	Log height: <input type="number" name="height">
        
        <br>
	Log water intake: <input type="text" name="water">
      
        <br>
        Log food intake
        <br>
      	Log breakfast: <input type="text" name="breakfast">
       
        <br>
      	Log lunch: <input type="text" name="lunch">
     
        <br>
        Log dinner: <input type="text" name="dinner">
      
        <br>
	Log snack: <input type="text" name="snack">
	<br>
        <input type="submit">
        <br>
</form>
<br>
Your weight is <?php echo $_GET["weight"] ?>
<br>
Your height is <?php echo $_GET["height"] ?>
<br>
Your water intake is <?php echo $_GET["water"] ?>
<br>
Your breakfast is <?php echo $_GET["breakfast"] ?>
<br>
Your lunch is <?php echo $_GET["lunch"] ?>
<br>
Your dinner is <?php echo $_GET["dinner"] ?>
<br>
Your snack is <?php echo $_GET["snack"] ?>
<br>
</body>
</html>


