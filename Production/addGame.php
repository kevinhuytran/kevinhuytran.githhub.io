<?php
include("connect.php");

echo "We have received your input!<br>";
echo "Here is the following:<br>";

$gameTitle = $_POST["gameTitle"];
$gameDescription = $_POST["gameDescription"];
$gameLink = nl2br($_POST["gameLink"]);
$gameImage = $_POST["gameImage"];
$gameTags = $_POST["gameTags"];

echo "Game Title: $gameTitle<br>";
echo "Description: $gameDescription<br>";
echo "Link: $gameLink<br>";
echo "Image: $gameImage<br>";
echo "Tags: $gameTags<br>";

$sql = "INSERT INTO Games (Game_Title, Game_Description, Link, Image, Tags)
VALUES (\"$gameTitle\",\"$gameDescription\",\"$gameLink\",\"$gameImage\",\"$gameTags\")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Game_ID, Game_Title FROM Games";
$result = $conn->query($sql);
echo "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Game ID " . $row["Game_ID"]. " - Game Title: " . $row["Game_Title"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
