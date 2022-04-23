<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $_userdata = checkLogin($con);

    if($_userdata['privileges'] != "admin"){
        header("location: index.php");
        die;
    }

    //User informations
    $query = "select user_id,user_name,user_password,user_fullname,date from user_accounts order by date";
    $result = mysqli_query($con, $query);
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
                <h3>Users: <?php echo sizeof($users['user_id']) ?></h3>
            </div>
        </div>
        <a href="logout.php">Log Out</a>
    </body>
</html>