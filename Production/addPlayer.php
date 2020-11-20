<?php
include("connect.php");

if(isset($_POST["submit"])) {
    echo "We have received your input!<br>";
    echo "Here is the following:<br>";
}

$playerInGameName = $_POST['playerInGameName'];
$playerName = $_POST['playerName'];
$playerCountry = $_POST['playerCountry'];
$playerDOB = $_POST['playerDOB'];
$playerDesc = nl2br($_POST['playerDesc']);
$playerSettings = $_POST['playerSettings'];
$playerImage = $_FILES['playerImage'];
$playerTags = $_POST['playerTags'];

// stuff to do with image file
print_r($_FILES);
$fileName = $playerImage['name'];
$fileTmpName = $playerImage['tmp_name'];
$fileSize = $playerImage['size'];
$fileError = $playerImage['error'];
$fileType = $playerImage['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$fileDestination = 'images/player-default.png';

if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 1000000) {
            $fileNameNew = $playerName.".".$fileActualExt;
            $fileDestination = 'images/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            echo "File uploaded successfully";
        } else {
            echo "File is bigger than 1MB!";
        }
    } else {
        echo "Error uploading the file";
    }
} else {
    echo "You cannot upload files of this type";
}

// display
echo "In-Game Name: $playerInGameName<br>";
echo "Actual Name: $playerName<br>";
echo "Country: $playerCountry<br>";
echo "Date-of-Birth: $playerDOB<br>";
echo "Description: $playerDesc<br>";
echo "Settings: $playerSettings<br>";
echo "Tags: $playerTags<br>";

$sql = "INSERT INTO Players (TeamID, InGameName, FullName, Country, DOB, PlayerDesc, Settings, ImagePath, Tags)
        VALUES (4,'$playerInGameName','$playerName','$playerCountry','$playerDOB','$playerDesc','$playerSettings','$fileDestination','$playerTags')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Player_ID, In_Game_Player_Name FROM Players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $Player_ID = $row['Player_ID'];
        echo "<a href='viewPlayer.php?Player_ID=$Player_ID'>In-Game Name:</a>" . $row["In_Game_Player_Name"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();