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
    <nav class="navbar navbar-expand-lg navbar-dark mb-5" style="background-color: #2B303A;">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="gameForm.html">Add Game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="playerForm.php">Add Player</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sponsorForm.html">Add Sponsor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teamForm.php">Add Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listPlayers.php">Players</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Teams</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="container-md">
    <div class="d-md-flex" style="background: yellow">
        <div class="img-fluid mx-auto" style="background: green; max-width: 300px">
        <?php
        require("connect.php");
        $playerID = $_GET['PlayerID'];
        $sql = "SELECT * FROM Players WHERE PlayerID ='".$playerID."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo "<img src='" . $row['ImagePath'] . "' class='img-fluid'>";
        $conn->close();
        ?>
        </div>
        <div class="container-fluid" style="background: purple">
            <?php
            require("connect.php");
            $playerID = $_GET['PlayerID'];
            $sql = "SELECT * FROM Players WHERE PlayerID ='".$playerID."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "PLAYER INFORMATION<br>AHHHHHH<br>CHECK CHECK<br>";
            $conn->close();
            ?>
        </div>
    </div>
    <div class="container-fluid" style="background: red">
        <?php
        require("connect.php");
        $playerID = $_GET['PlayerID'];
        $sql = "SELECT * FROM Players WHERE PlayerID ='".$playerID."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo $row['PlayerDesc'];
        $conn->close();
        ?>
    </div>

</main>
</body>
</html>

