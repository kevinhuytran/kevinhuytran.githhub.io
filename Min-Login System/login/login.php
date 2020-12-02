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

if ($result->num_rows > 0){
	while($row=$result->fetch_assoc()){
		echo "<br><br>subject: ".$row["subject"]."<br>";
		echo "location: ".$row["location"]."<br>";
		echo "date taken: ".$row["date_taken"]."<br>";

		echo "<table>";
			echo "<tr><td><img src=$row[url] width=500 height=300></td><td><i>caption: $row[subject], $row[location]</i></tr>";
		echo "</table>";		
	}

}

else{
	echo "0 results";
}

?>