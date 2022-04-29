<?php
    session_start();

    require("connection.php");
    require("functions.php");
    $_userdata = checkLogin($con);
    
    if($_userdata['privileges'] == "admin"){
      header("location: admin.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asw | Dashboard</title>
        <link rel="stylesheet" type="text/css" href="user_dashboard.css">
    </head>
    <body>
        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <form action="index.php" method="post">
              <h4>Do you want to remove this account from the database?</h4>
              <input type="submit" name="choice" value="Yes">
              <input type="button" value="No" onclick="modal.style.display = 'none';">
            </form>
            <?php
              if(isset($_POST['choice'])){
                if($_POST['choice'] == "Yes"){
                  $query = "DELETE FROM user_accounts WHERE user_id = '".$_SESSION['user_id']."'";
                  mysqli_query($con,$query);
                  session_destroy();
                  header("location: login.php");
                  die;
                }
              }
            ?>
          </div>
        </div>

        <div class="dash-header">
            <div id="dash-title"><h1>User Dashboard</h1></div>
            <div id="logout"><p><a href="logout.php">Log Out</a></p></div>
            <div id="removeacc"><p>Remove Account</p></div>
        </div>
        <h2>Welcome, <?php echo $_userdata['user_fullname'];?></h2>
        <h5>Username: <?php echo $_userdata['user_name'];?></h5>

    </body>
    <script src="user_dashboard.js"></script>
</html>