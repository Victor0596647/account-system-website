<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $_userdata = checkLogin($con);
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Dashboard</h1>
        <hr>
        <h3>Welcome, <?php echo $_SESSION['name'];?></h3>
        <h5>Username: <?php echo $_SESSION['username'];?></h5>
        <a href="logout.php">Log Out</a>
        <a href="remove_account.php">Remove Account</a>
    </body>
</html>