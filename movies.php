<?php
$pageTitle = "Films - Movie List";
$pageStyle = "../assets/style_movies.css";
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
$movie = getMovie();
} catch (PDOException) {
    echo "Erreur lors de la récupération des films";
    exit;
}
?>

<div class="contain">
    <div class="d-flex flex-wrap justify-content-start">
        <?php displayMovie($movie); ?>
    </div>
</div>