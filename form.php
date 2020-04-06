<form action= "site.php" method="get">
        Log weight: <input type="number" name="weight">
        <input type="submit">
        <br>
	Log height: <input type="number" name="height">
        <input type="submit">
        <br>
	Log water intake: <input type="text" name="water">
        <input type="submit">
        <br>
        Log food intake: <input type="text" name="food">
        <input type="submit">
        <br>
      	Log breakfast: <input type="text" name="breakfast">
        <input type="submit">
        <br>
      	Log lunch: <input type="text" name="lunch">
        <input type="submit">
        <br>
        Log dinner: <input type="text" name="dinner">
        <input type="submit">
        <br>
	Log snacks: <input type="text" name="snacks">
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
Your food intake is <?php echo $_GET["food"] ?>
<br>
Your breakfast is <?php echo $_GET["breakfast"] ?>
<br>
Your lunch is <?php echo $_GET["lunch"] ?>
<br>
Your dinner is <?php echo $_GET["dinner"] ?>
<br>
Your snack is <?php echo $_GET["snacks"] ?>
<br>
</body>
</html>


