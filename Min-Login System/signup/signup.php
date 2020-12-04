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
    echo "Connected successfully<br>";
}

$username = $_POST['username'];
$password1 = $_POST['password'];
$password2 = $_POST['password-repeat'];

echo "Username: ".$username. "<br>";
echo "Password: ".$password1. "<br>";
echo "Password-repeat: ".$password2. "<br>";


$result = $conn->query("SELECT Username FROM Users WHERE Username=$username")

if ($result->num_rows == 0){
    $sql = "INSERT INTO Users(Username, Password) VALUES (\"$username\", \"$password\");";

    else{
        echo "Username is already occupied! Try different username!"
    }
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Username, Password FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["Username"]. " - Password: " . $row["Password"] . "<br>";
    }
} else {
    echo "0 results";
}
?>
