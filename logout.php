<?php
require 'libraries/functions.inc.php';
global $link;
session_start();

    $user_id = $_SESSION['user_id'];
    //$today = date('Y-m-d, g:i a');
    $today = format_post_date(time() + 3600);
    $sql_login = "SELECT * FROM login WHERE user_id = '$user_id'";
    $query_login = mysqli_query($link, $sql_login);

    if (mysqli_num_rows($query_login) > 0) {
        $sql = "UPDATE login SET last_login = '$today' WHERE user_id='$user_id'";
        $query = mysqli_query($link, $sql);
    }else{
        $sql = "INSERT INTO login (user_id, last_login) VALUES ('$user_id','$today')";
        $query = mysqli_query($link, $sql);
    }

session_destroy();
header("Location: index.php");