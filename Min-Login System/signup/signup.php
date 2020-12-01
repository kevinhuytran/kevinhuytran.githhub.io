<?php

$username = $_POST['username'];
$password = $_POST['password'];

echo "Username: ".$username. "<br>";
echo "Password: ".$password. "<br>";

$sql = "INSERT INTO Users(Username, Password) VALUES ($username, $password)";


if (mysqli_multi_query($conn,$sql)){
    echo "New record created successfully";
}

else{
    echo "Er
?>
