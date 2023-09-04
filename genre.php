<?php
$pageTitle = "Films - Movie List";
$pageStyle = "../assets/style_movies.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Movie.php';
require_once 'functions/getGenre.php';
require_once 'functions/displayMovie.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'layout/sidebar.php';


if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
  }

try {
$movies = getGenre($pdo);
} catch (PDOException) {
    echo "Erreur lors de la récupération des films";
    exit;
}

// Vérification d'erreur pour pouvoir interrompre le script au plus tôt
if (!isset($_GET['genre_name']))
{
    http_response_code(400); // Bad Request
    ?> <h2>Le name est requis dans l'url</h2> <?php
    exit;
}

$urlId = $_GET['genre_name']; 
if ($urlId === null)
{
    http_response_code(400); 
    ?> <h2>Le name est incorrect</h2> <?php
    exit;
}
?>

<?php // Filter movies by genre name
$filteredMovies = array_filter($movies, function ($movie) use ($urlId) {
    return $movie['genre_name'] === $urlId;
}); ?>

<div style="margin: 30px 0px 0px 320px;">
    <div class="d-flex flex-wrap justify-content-start">
        <?php displayMovie($filteredMovies); ?>
    </div>
</div>