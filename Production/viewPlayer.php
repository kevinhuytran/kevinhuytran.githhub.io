<?php
require("connect.php");
$playerID = $_GET['id'];
$sql = "SELECT * FROM Players WHERE Player_ID ='".$playerID."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['Player_Description'] . "<br>";
$conn->close();

