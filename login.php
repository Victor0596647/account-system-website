<?php
    session_start();
    include("connection.php");
    include("functions.php");
    
    if(checkSession($con)){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asw | Sign In</title>
    </head>
    <body>
        <div class="form-container">
            <h2>Sign In</h2>
            <form action="login.php" method="post">
                <label>Username:</label>
                <input type="text" name="log_username" value="<?php echo $_POST['log_username'];?>">
                <br>
                <label>Password:</label>
                <input type="password" name="log_password">
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
            <a href="signup.php">Don't have an account?</a>
            <?php
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
                                $_SESSION['user_id'] = $user_data['user_id'];
                                mysqli_free_result($result);
                                header("location: index.php");
                                die;
                            }else{
                                echo "<p id='form-error'>Wrong Password.</p>";
                            }
                        }else{
                            echo "<p id='form-error'>Username does not exist.</p>";
                        }
                    }else{
                        echo "<p id='form-error'>Some information are empty.</p>";
                    }
                }
            ?>
        </div>
    </body>
</html>