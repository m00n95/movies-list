<?php
$pageTitle = "Films - Movie List";
$pageStyle = "../assets/style_movies.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Movie.php';
require_once 'functions/getMovie.php';
require_once 'functions/displayMovie.php';

$movies = getMovie();
?>

<div class="contain">
    <div class="row">
        <?php displayMovie($movies); ?>
    </div>
</div>