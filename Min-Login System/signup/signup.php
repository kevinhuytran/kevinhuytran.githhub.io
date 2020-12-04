<?php
$servername = "localhost";
$username1 = "root";
$password = "ZQMgH1SFiWal";
$dbname = "EsportsEncyclopedia";

// Create connection
$conn = new mysqli($servername, $username1, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else {
    echo "Connected successfully<br><br>";
}

//Program ---------------------------------------------------------------

$username = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['password-repeat'];

echo "Username: ".$username. "<br>";
echo "Password: ".$password1. "<br>";
echo "Password-repeat: ".$password2. "<br>";


$insertsql = "INSERT INTO Users(Username, Password) VALUES ('$username', '$password1')";

$selectsql = "SELECT Username, Password FROM Users WHERE Username='$username'";
$result = $conn->query($selectsql);


if ($result->num_rows > 0){
    echo "This Username is already taken! Please use other Username!";
    header("Location: http://3.230.1.132/retrySignup.html");
}

else if ($conn->query($insertsql) === TRUE) {
    echo "New record created successfully<br>"; 
    header("Location: http://3.230.1.132/login.html");
}

else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

?>
