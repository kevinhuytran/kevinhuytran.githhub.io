<?php
require("connect.php");
$sponsorID = $_GET['SponsorID'];
$sql = "SELECT * FROM Sponsors WHERE SponsorID ='" . $sponsorID . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Esport Encyclopedia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
        header {
            font-family: "DejaVu Sans Mono", sans-serif;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark mb-5" style="background-color: #2B303A;">
        <a class="navbar-brand" href="."><img src="images/logo2.svg" style="max-width: 50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="gameForm.html">Add Game</a>
                        <a class="dropdown-item" href="playerForm.php">Add Player</a>
                        <a class="dropdown-item" href="sponsorForm.html">Add Sponsor</a>
                        <a class="dropdown-item" href="teamForm.php">Add Team</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listGames.php">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listPlayers.php">Players</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listSponsors.php">Sponsors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listTeams.php">Teams</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="container-md">
    <?php
    echo "<a href='editSponsor.php?SponsorID=" . $sponsorID . "'><button class='btn btn-primary'>Edit</button></a>";
    echo "<h1 style='text-align: center'>" . $row['Name'] . "</h1>";
    ?>
    <div class="container-fluid">
        <?php
        echo "<img src='" . $row['Imagepath'] . "' class='img-fluid mx-auto d-block'>";
        ?>
    </div>
    <div class="container-fluid mt-3 border-top">
        <h2>Description</h2>
        <?php
        echo $row['SponsorDesc'];
        ?>
    </div>
</main>
</body>
</html>

