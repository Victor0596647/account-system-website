<?php
    session_start();

    include("connection.php");
    include("functions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asw | Sign Up</title>
        <link rel='stylesheet' type='text/css' href='signin-up.css'>
    </head>
    <body>
        <div class="form-container">
            <h2>Sign Up</h2>
            <form action="signup.php" method="post">
                <label>Name:</label>
                <input type="text" name="sign_name" value="<?php echo $_POST['sign-name']?>">
                <br>
                <label>Username:</label>
                <input type="text" name="sign_username">
                <br>
                <label>Password:</label>
                <input type="password" name="sign_password" value="<?php echo $_POST['sign-password']?>">
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
            <a href="login.php">Already have an account?</a>
            <?php
                if(isset($_POST['submit'])){
                    $name = filter_input(INPUT_POST,'sign_name',FILTER_SANITIZE_SPECIAL_CHARS);
                    $username = filter_input(INPUT_POST,'sign_username',FILTER_SANITIZE_SPECIAL_CHARS);
                    $password = $_POST['sign_password'];

                    if(!empty($name) && !empty($username) && !empty($password)){
                        $query = "SELECT * FROM user_accounts WHERE user_name = '$username' LIMIT 1";
                        $result = mysqli_query($con,$query);
                        $matchFound = mysqli_num_rows($result) > 0;
                        if($matchFound){
                            echo "<p id='form-error'>Username already exists, make something unique.</p>";
                        }else{
                            $user_id = random_num(5);
                            $query = "INSERT INTO user_accounts (user_id, user_name, user_password, user_fullname, privileges, note) VALUES ('$user_id', '$username', '$password', '$name', 'user', 'Hello I am $name');";
                            mysqli_query($con, $query);
                            
                            $_SESSION['user_id'] = $user_id;
                            header("location: index.php");
                            die;
                        }
                    }else{
                        echo "<p id='form-error'>Some information are empty.</p>";
                    }
                }
            ?>
        </div>
    </body>
</html>