<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $_userdata = checkLogin($con);

    if($userdata['privileges'] != "admin"){
        header("location: index.php");
        die;
    }else{
        $query = "select userid,user_name,user_password,name from user_accounts order by date_creation";
        $result = mysqli_query($con, $query);
        $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
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
                <h3>Users: <?php echo sizeof($users['userid']) ?></h3>
            </div>
        </div>
        <a href="logout.php">Log Out</a>
    </body>
</html>