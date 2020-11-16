<?php
$servername = "localhost";
$username = "root";
$password = "ZQMgH1SFiWal";
$dbname = "EsportsEncyclopedia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

echo "We have received your input!<br>";
echo "Here is the following:<br>";

$playerInGame = $_POST["playerInGame"];
$playerName = $_POST["playerName"];
$playerDesc = nl2br($_POST["playerDescription"]);
$playerSettings = $_POST["playerSettings"];
$playerLink = $_POST["playerLink"];
$playerImage = $_POST["playerImage"];
$playerTags = $_POST["playerTags"];

echo "In-Game Name: $playerInGame<br>";
echo "Actual Name: $playerName<br>";
echo "Description: $playerDesc<br>";
echo "Settings: $playerSettings<br>";
echo "Link: $playerLink<br>";
echo "Image: $playerImage<br>";
echo "Tags: $playerTags<br>";

$sql = "INSERT INTO Players (Team_ID, In_Game_Player_Name, Player_Name, Player_Description, Player_Settings, Link, Image, Tags)
VALUES (4,\"$playerInGame\",\"$playerName\",\"$playerDesc\",\"$playerSettings\",\"$playerLink\",\"$playerImage\",\"$playerTags\")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Player_ID, In_Game_Player_Name FROM Players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Player ID: " . $row["Player_ID"]. " - In-Game Name: " . $row["In_Game_Player_Name"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
