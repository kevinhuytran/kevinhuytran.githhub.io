<?php

$username = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['password-repeat'];

echo "Username: ".$username. "<br>";
echo "Password: ".$password1. "<br>";
echo "Password-repeat: ".$password2. "<br>";

$sql = "INSERT INTO Users(Username, Password) VALUES ($username, $password)";


if (mysqli_multi_query($conn,$sql)){
    echo "New record created successfully";
}

else{
    echo "Error";
}
?>
