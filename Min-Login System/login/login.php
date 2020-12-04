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
$password = $_POST['password'];

echo "Username: ".$username. "<br>";
echo "Password: ".$password. "<br>";

$sql="SELECT Username, Password FROM Users WHERE Username=$username, Password=$password";
$result=$conn->query($sql);

if ($result->num_rows == 0){
	echo "No Existing User! No matching Username/Password!";

    else{
		echo "Successfully login!"
    }
}
?>