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

$gameTitle = $_POST['gameTitle'];
$gameImage = $_FILES['gameImage'];
$gameIcon = $_FILES['gameIcon'];
$gameDesc = nl2br($_POST['gameDesc']);
$gameTags = $_POST['gameTags'];

$gameNewImage = create_image($gameImage,$gameTitle);
$gameNewIcon = create_image($gameIcon,"$gameTitle".'ICON');

echo "Game Title: $gameTitle<br>";
echo "Description: $gameDesc<br>";
echo "Game Image Path: $gameNewImage<br>";
echo "Game Icon Path: $gameNewIcon<br>";
echo "Tags: $gameTags<br>";

$sql = "INSERT INTO Games (Title, ImagePath, IconPath, GameDesc, Tags)
VALUES ('$gameTitle','$gameNewImage','$gameNewIcon','$gameDesc','$gameTags')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Title, GameDesc FROM Games";
$result = $conn->query($sql);
echo "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['Title'] . '<br>';
        echo $row['GameDesc'] . '<br>';
    }
} else {
    echo "0 results";
}
$conn->close();
