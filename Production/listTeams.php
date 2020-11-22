<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Esport Encyclopedia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("img").hover(function(){
                $(this).css("transition", "transform .3s");

                $(this).css("transform", "scale(1.15)");
            }, function(){
                $(this).css("transform", "scale(1)");
            });
        });
    </script>
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
                    <a class="nav-link" href=".">Players</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Teams</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="container-md">
    <h2>Teams</h2>
    <div class="list-group">
        <?php
        include("connect.php");
        $sql = "SELECT p.TeamID, p.TeamName, g.IconPath FROM Players p, Games g WHERE p.GameID=g.GameID";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<a href='viewTeam.php?TeamID=" . $row['p.TeamID'] . "' class='list-group-item list-group-item-action'>" . $row['p.TeamName'] . "</a>";
            }
        } else {
            echo "There are no teams available at the moment. Please try again later.";
        }
        $conn->close();
        ?>
    </div>
</main>
</body>
</html>