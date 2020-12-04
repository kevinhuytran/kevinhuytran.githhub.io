<?php
require("connect.php");

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT Username, Password FROM Users WHERE Username='$username' AND Password='$password'";
$result = $conn->query($sql);

//login success. redirecting to main page
if ($result->num_rows > 0){

    //session username created
    $_SESSION['username']=$username;
    
    header("Location: http://3.230.1.132/index.html");
}

//login failed, redirecting to retry page
else{
    header("Location: http://3.230.1.132/retryLogin.html");

}

?>