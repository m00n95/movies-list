<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $pageStyle; ?>">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <div class="logo"> 
     <a href="../homepage.php"><img src="/assets/img/Movie-List-black.png" alt="logo"></a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../homepage.php">&#128306; Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../movies.php">&#128253; Films</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../account.php">&#128100; Compte</a>
        </li>
      </ul>
    </div>
  </div>
</nav>