<?php
include("connect.php");

function create_image(&$image, $title) {
    $fileName = $image['name'];
    $fileTmpName = $image['tmp_name'];
    $fileSize = $image['size'];
    $fileError = $image['error'];
    // $fileType = $image['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'svg');

    $fileDestination = 'images/game-default.png';

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = $title.".".$fileActualExt;
                $fileDestination = 'images/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "File uploaded successfully<br>";
            } else {
                echo "File is bigger than 1MB!<br>";
            }
        } else {
            echo "Error uploading the file<br>";
        }
    } else {
        echo "You cannot upload files of this type<br>";
    }
    return $fileDestination;
}

if(isset($_POST['submit'])) {
    echo "We have received your input!<br>";
    echo "Here is the following:<br>";
}

$gameID = $_POST['Game'];
$teamID = $_POST['Team'];
$playerInGameName = $_POST['playerInGameName'];
$playerName = $_POST['playerName'];
$playerCountry = $_POST['playerCountry'];
$playerDOB = $_POST['playerDOB'];
$playerDesc = nl2br($_POST['playerDesc']);
$playerSettings = $_POST['playerSettings'];
$playerImage = $_FILES['playerImage'];
$playerTags = $_POST['playerTags'];

$playerNewImage = create_image($playerImage,$playerName);

// display
echo "In-Game Name: $playerInGameName<br>";
echo "Actual Name: $playerName<br>";
echo "Country: $playerCountry<br>";
echo "Date-of-Birth: $playerDOB<br>";
echo "Description: $playerDesc<br>";
echo "Settings: $playerSettings<br>";
echo "Tags: $playerTags<br>";

$sql = "INSERT INTO Players (GameID, TeamID, InGameName, FullName, Country, DOB, PlayerDesc, Settings, ImagePath, Tags)
        VALUES ($gameID, $teamID,'$playerInGameName','$playerName','$playerCountry','$playerDOB','$playerDesc','$playerSettings','$playerNewImage','$playerTags')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT PlayerID, InGameName FROM Players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $PlayerID = $row['PlayerID'];
        echo "<a href='viewPlayer.php?PlayerID=$PlayerID'>In-Game Name:</a>" . $row["InGameName"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();