<?php
  echo "<header>";
  echo '<nav class="navbar navbar-expand-md navbar-dark mb-5" style="background-color: #2B303A;">';
  echo '<a class="navbar-brand" href="."><img src="images/logo2.svg" style="max-width: 50px"></a>';
  echo '<a class="navbar-brand" href="aboutUs.html">AboutUs</a>';
  echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
  echo '<span class="navbar-toggler-icon"></span></button>';
  echo '<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">';
  echo '<ul class="navbar-nav">';
  echo '<li class="nav-item dropdown">';
  echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Admin </a>';
  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
  echo '<a class="dropdown-item" href="gameForm.html">Add Game</a>';
  echo '<a class="dropdown-item" href="playerForm.php">Add Player</a>';
  echo '<a class="dropdown-item" href="sponsorForm.html">Add Sponsor</a>';
  echo '<a class="dropdown-item" href="teamForm.php">Add Team</a> </div></li>';
  echo '<li class="nav-item"><a class="nav-link" href="listGames.php">Games</a></li>';
  echo '<li class="nav-item"><a class="nav-link" href="listPlayers.php">Players</a></li>';
  echo '<li class="nav-item">  <a class="nav-link" href="listSponsors.php">Sponsors</a></li>';
  echo '<li class="nav-item"><a class="nav-link" href="listTeams.php">Teams</a></li>';
  echo '</ul></div></nav></header>';
 ?>
