<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<title>Nutrition App</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Nutrition</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/home.php" class="nav-link">Home</a>
                </li>
<?php if(!isset($_SESSION['user'])):?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/login.php" class="nav-link">Login</a>
                </li>
<?php endif;?>
<?php if(isset($_SESSION['user'])):?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/profile.php" class="nav-link">Profile</a>
                </li>
          <?php endif;?>
       <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/form.php" class="nav-link">Data</a>
                </li>
 <?php if(isset($_SESSION['user'])):?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/list.php?page=Info" class="nav-link">Meals</a>
                </li>
 

                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/past.php" class="nav-link">My Past Meals</a>
                </li>
<?php endif;?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/goals.php" class="nav-link">Goals</a>
                </li>
<?php if(isset($_SESSION['user'])):?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/list.php?page=Favorites" class="nav-link">Favorites</a>
                </li>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/history.php" class="nav-link">History</a>
                </li>
<?php endif;?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/logout.php" class="nav-link">Logout</a>
                </li>
 <?php if(isset($_SESSION['user'])):?>
                <li class="nav-item">
                    <a href="https://web.njit.edu/~pg425/My-Project/admin.php" class="nav-link">About</a>
                </li>
                <?php endif;?>
            </ul>
           <?php if(isset($_SESSION['user'])):?>
                <span class="text-right text-secondary navbar-text">Welcome</span>
               <?php endif;?>           
        </div>
    </nav>
</body>

</html>

