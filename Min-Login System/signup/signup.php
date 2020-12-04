<?php
include("connect.php");

//Program ---------------------------------------------------------------

$username = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['password-repeat'];

echo "Username: ".$username. "<br>";
echo "Password: ".$password1. "<br>";
echo "Password-repeat: ".$password2. "<br>";

$selectsql = "SELECT Username FROM Users WHERE Username='$username'";
$result = $conn->query($selectsql);
if ($result->num_rows > 0){
    echo "This Username is already taken! Please use other Username";
    sleep(3);
    header("Location: retry.html");
}

$sql = "INSERT INTO Users(Username, Password) VALUES ('$username', '$password1')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
    header("Location: index.html");
}
