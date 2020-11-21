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

$gameID = (int)$_POST['Game'];
$sponsorID = (int)$_POST['Sponsor'];
$teamName = $_POST['teamName'];
$teamDesc = nl2br($_POST['teamDesc']);
$teamImage = $_FILES['teamImage'];
$teamTags = $_POST['teamTags'];

$teamNewImage = create_image($teamImage,$teamName);

// display
echo "Game ID: " . $gameID . "<br>";
echo "Sponsor ID: " . $sponsorID . "<br>";
echo "Team Name: " . $teamName . "<br>";
echo "Team Description: " . $teamDesc . "<br>";
echo "Team Tags: " . $teamTags . "<br>";

$sql = "INSERT INTO Teams (GameID, SponsorID, TeamName, ImagePath, TeamDesc, Tags)
        VALUES ($gameID, $sponsorID, '$teamName','$teamNewImage','$teamDesc','$teamTags')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT TeamID, TeamName FROM Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Team ID: " . $row['TeamID'] . "<br>";
        echo "Team Name: " . $row['TeamName'] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();