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

$sponsorName = $_POST['sponsorName'];
$sponsorImage = $_FILES['sponsorImage'];
$sponsorIcon = $_FILES['sponsorIcon'];
$sponsorDesc = nl2br($_POST['sponsorDesc']);
$sponsorTags = $_POST['sponsorTags'];

$sponsorNewImage = create_image($sponsorImage,'SPONSOR-' . $sponsorName);
$sponsorNewIcon = create_image($sponsorImage,$sponsorName . 'ICON');

echo "Game Title: $sponsorName<br>";
echo "Description: $sponsorDesc<br>";
echo "Game Image Path: $sponsorNewImage<br>";
echo "Game Icon Path: $sponsorNewIcon<br>";
echo "Tags: $sponsorTags<br>";

$sql = "INSERT INTO Sponsors (Name, ImagePath, IconPath, SponsorDesc, Tags)
VALUES ('$sponsorName','$sponsorNewImage','$sponsorNewIcon','$sponsorDesc','$sponsorTags')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Name, SponsorDesc FROM Sponsors";
$result = $conn->query($sql);
echo "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['Name'] . '<br>';
        echo $row['SponsorDesc'] . '<br>';
    }
} else {
    echo "0 results";
}
$conn->close();
