<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/../assets/style.css">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <div class="logo"> 
  <?php if (isset($_SESSION['password'])) { ?>
     <a href="../homepage.php"><?php } ?><img src="/assets/img/Movie-List-black.png" alt="logo"></a>
  </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <?php if (isset ($_SESSION['password'])) { ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../homepage.php">&#10148; Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../movies.php">&#128253; Films</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../add_movie.php">&#10010; Ajouter un film</a>
        </li> 
      </ul>
      <?php } ?>
    </div>
    <?php if (isset($_SESSION['password'])) { ?>
          <a href="/login/logout.php"><button class="btn btn-dark">Déconnexion</button></a>
      <?php } else { ?>
          <a href="/login/login.php"><button class="btn btn-dark">Connexion</button></a>
      <?php } ?>
  </div>
</nav>