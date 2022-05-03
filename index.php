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
        <div id="prompt" class="prompt">
          <div class="prompt-content" id="prompt-content">
            <span id="close">&times;</span>
            <form action="index.php" method="post">
              <h4>Do you want to remove this account from the database?</h4>
              <input type="submit" name="choice" value="Yes">
              <input type="button" value="No" onclick="promptBg.style.display = 'none'">
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
            <div id="dash-title">
                <h1>User Dashboard</h1>
            </div>
            <div class="account-function">
                <div id="logout" onclick="location.replace('logout.php')"><p>Log Out</p></div>
                <div id="removeacc"><p>Remove Account</p></div>
            </div>
        </div>
        <div class="main-content">
            <h2>Welcome, <?php echo $_userdata['user_fullname']?></h2>
            <div class="user-note">
                <form action="index.php" method="post">
                    <textarea id="note" name="note" placeholder="write something about yourself..." cols="40" rows="10"><?php echo $_userdata['note']?></textarea><br>
                    <input type="submit" value="Update" name="submit" />
                </form>
                <?php
                  if(isset($_POST['submit'])){
                    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_SPECIAL_CHARS);
                    $query = "UPDATE user_accounts SET note = 'i luv cookie so muuuuucccchhhh!!!' WHERE user_id = " . $_userdata['user_id'];
                    mysqli_query($con,$query);
                  }
                ?>
            </div>
        </div>
    </body>
    <script src="user_dashboard.js"></script>
</html>