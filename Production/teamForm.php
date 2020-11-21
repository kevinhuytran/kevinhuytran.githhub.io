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
    <script src="validateTeamForm.js"></script>
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
                    <a class="nav-link" href="#">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Players</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Teams</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="container-md">
    <h1>Submit a Team Profile!</h1>
    <form action="insertTeam.php"
          enctype="multipart/form-data"
          method="post"
          onsubmit="return validateForm(
              document.getElementById('teamName'),
              document.getElementById('teamDesc'),
              document.getElementById('teamTags')
              )
    ">
        <div class="form-group">
            <label for="Game">Select Game</label>
            <select class="form-control" id="Game" name="Game">
                <?php
                include("connect.php");
                $sql = "SELECT GameID, Title FROM Games";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['GameID']."'>".$row['Title']."</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Sponsor">Select Sponsor</label>
            <select class="form-control" id="Sponsor" name="Sponsor">
                <?php
                include("connect.php");
                $sql = "SELECT SponsorID, Name FROM Sponsors";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['SponsorID']."'>".$row['Name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="teamName">Team Name</label>
            <input type="text" class="form-control" id="teamName" name="teamName">
        </div>
        <div class="form-group">
            <label for="teamImage">Image</label>
            <input type="file" onchange="ValidateSize(this)" class="form-control" id="teamImage" name="teamImage">
        </div>
        <div class="form-group">
            <label for="teamDesc">Description</label>
            <textarea class="form-control" id="teamDesc" rows="5" name="teamDesc" style="white-space: pre-line;"></textarea>
        </div>
        <div class="form-group">
            <label for="teamTags">Tags</label>
            <input type="text" class="form-control" id="teamTags" name="teamTags">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
</body>
</html>
