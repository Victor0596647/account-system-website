<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $_userdata = checkLogin($con);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asw | Dashboard</title>
    </head>
    <body>
        <h1>Account Dashboard</h1>
        <hr>
        <h3>Welcome, <?php echo $_userdata['user_fullname'];?></h3>
        <h5>Username: <?php echo $_userdata['user_name'];?></h5>
        <a href="logout.php">Log Out</a>
        <a href="remove_account.php">Remove Account</a>
    </body>
</html>