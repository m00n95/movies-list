<?php
$pageTitle = "Films - Movie List";
$pageStyle = "../assets/style_movies.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Movie.php';
require_once 'functions/getMovie.php';
require_once 'functions/displayMovie.php';

$movie = getMovie();
?>

<div class="contain">
    <div class="d-flex flex-wrap justify-content-start">
        <?php displayMovie($movie); ?>
    </div>
</div>