<?php
    session_start();

    require("connection.php");
    require("functions.php");
    $_userdata = checkLogin($con);

    if($_userdata['privileges'] != "admin"){
        header("location: index.php");
        die;
    }

    //User informations
    $query = "select * from user_accounts where privileges = 'user'";
    $result = mysqli_query($con, $query);
    $users = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asw | Admin</title>
        <link rel="stylesheet" type="text/css" href="user_dashboard.css">
    </head>
    <body>
        <h1>Admin Dashboard</h1>
        <hr>
        <div class="data-container">
            <div class="user-population">
                <h3>Users: <?php echo $users ?></h3>
            </div>
        </div>
        <a href="logout.php">Log Out</a>
    </body>
</html>