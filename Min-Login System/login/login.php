<?php
session_start(); //kt
require("connect.php");
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Users WHERE Username='$username' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $_SESSION['username'] = $username; //kt
        $_SESSION['id'] = $result['UserID'];
        header("Location: http://3.230.1.132/index.php");
    }

    //login failed, redirecting to retry page
    else{
        header("Location: http://3.230.1.132/retryLogin.html");
    }
}

