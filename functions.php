<?php
function checkLogin($con){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION["user_id"];
        $query = "select * from user_accounts where user_id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //Error
    header("location: login.php");
    die;
}

function random_num($num){
    $text = "";
    if($num < 5){
        $num = 5;
    }

    $len = rand(4,$num);

    for ($i=0; $i < $len; $i++){
        $text .= rand(0,9);
    }
    return $text;
}
?>