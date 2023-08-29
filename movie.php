<?php
$pageTitle = "name - Movie List";
$pageStyle = "../assets/style_movie.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Movie.php';
require_once 'functions/getMovie.php';
require_once 'functions/displayMovie.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
  }

try {
    $movies = getMovie();
    } catch (PDOException) {
        echo "Erreur lors de la récupération des films";
        exit;
    }

// Vérification d'erreur pour pouvoir interrompre le script au plus tôt
if (!isset($_GET['id']))
{
    http_response_code(400); // Bad Request
    ?> <h2>L'id est requis dans l'url</h2> <?php
    exit;
}

$urlId = intval($_GET['id']); 
if ($urlId === 0)
{
    http_response_code(400); 
    ?> <h2>L'id est incorrect</h2> <?php
    exit;
}

foreach ($movies as $el)
{
    if ($el['id']/*->getId()*/ === $urlId)
    {
        $movie = $el;
    }
}

if (!isset($movie))
{
    ?> <h2>Aucun film correspondant</h2> <?php 
}
else
{ ?>

<h1 class="text-center mt-4 text-decoration-underline"><?php echo $movie['name']/*->getName()*/; ?></h1>

<div class="contain d-flex justify-content-around">
    <div>
        <img class="img-size" src="assets/img/<?php echo $movie['picture']/*->getPicture()*/; ?>" alt="affiche de film">
    </div>
    <div class="content mt-4">
        <p>Date de sortie : <?php echo $movie['release_date']/*->getReleaseDate()*/; ?></p>
        <p><?php echo $movie['summary']/*->getSummary()*/; ?></p>
    </div>
</div>


<?php } ?>

