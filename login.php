<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Sign In</h2>
        <form action="login.php" method="post">
            <label>Username:</label>
            <input type="text" name="log_username">
            <br>
            <label>Password:</label>
            <input type="password" name="log_password">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <a href="signup.php">Don't have an account?</a>
    </body>
</html>
<?php
include("connection.php");
include("functions.php");

if(isset($_POST['submit'])){
    $username = filter_input(INPUT_POST,'log_username',FILTER_SANITIZE_SPECIAL_CHARS);
    $userpass = $_POST['log_password'];
    if(!empty($username) && !empty($userpass)){
        $query = "SELECT * FROM user_accounts WHERE user_name = '$username' LIMIT 1";

        $result = mysqli_query($con,$query);
        $matchFound = mysqli_num_rows($result) > 0;
        if($matchFound){
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['user_password'] == $userpass){
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $user_data['user_fullname'];
                $_SESSION['user_id'] = $user_data['user_id'];
                
                header("location: index.php");
                die;
            }else{
                echo "Wrong Password.";
            }
        }else{
            echo "Username does not exist.";
        }
    }else{
        echo "Some information are empty.";
    }
}
?>