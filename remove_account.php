<?php
session_start();
include("connection.php");

if(isset($_POST['choice'])){
    if($_POST['choice'] == "yes"){
        $query = "DELETE FROM user_accounts WHERE user_id = '".$_SESSION['user_id']."'";
        mysqli_query($con,$query);
        session_destroy();
        header("location: login.php");
        die;
    }else if($_POST['choice'] == "no"){
        header("location: index.php");
        die;
    }
}
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="remove_account.php" method="post">
            <h4>Do you want to remove this account from the database?</h4>
            <input type="submit" name="choice" value="yes" placeholder="Yes">
            <input type="submit" name="choice" value="no" placeholder="No">
        </form>
    </body>
</html>