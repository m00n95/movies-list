<?php
$pageTitle = "name - Movie List";
$pageStyle = "../assets/style_movie.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Movie.php';
require_once 'functions/getMovie.php';
require_once 'functions/displayMovie.php';

$movies = getMovie();

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
    if ($el->getId() === $urlId)
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
    <div class="card" style="width: 18rem;">
              <img src="assets/img/<?php echo $movie->getPicture(); ?>" class="card-img-top" alt="affiche de film">
              <div class="card-body">
                <h5 class="card-title"><?php echo $movie->getName(); ?></h5>
                <p class="card-text"><?php echo $movie->getReleaseDate(); ?></p>
              </div>
            </div>
        </div>
<?php }
?>

