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
    mysqli_free_result($result);

    $query = "select * from user_accounts where privileges = 'admin'";
    $result = mysqli_query($con, $query);
    $admins = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asw | Admin</title>
        <link rel="stylesheet" type="text/css" href="admin_dashboard.css">
    </head>
    <body>
        <div class="dash-header">
            <div id="dash-title"><h1>Admin Dashboard</h1></div>
            <div class="account-function">
                <div id="logout" onclick="location.replace('logout.php')"><p>Log Out</p></div>
            </div>
        </div>
        <div class="main-content">
            <div class="data-container">
                <div class="total-population">
                    <h2><?php echo $users + $admins ?></h2>
                    <hr>
                    <p>Total</p>
                </div>
                <div class="specific-population">
                    <div class="user-population">
                        <h2><?php echo $users ?></h2>
                        <hr>
                        <p>Users</p>
                    </div>
                    <div class="admin-population">
                        <h2><?php echo $admins ?></h2>
                        <hr>
                        <p>Admins</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>