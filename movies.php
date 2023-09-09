<?php
$pageTitle = "Films - Movie List";
require_once 'layout/header.php';
require_once 'classes/Movie.php';
require_once 'functions/getMovie.php';
require_once 'functions/displayMovie.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'layout/sidebar.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
  }

try {
$pdo = getDbConnection();
$movie = getMovie();
} catch (PDOException) {
    echo "Erreur lors de la récupération des films";
    exit;
}
?>

<div style="margin: 30px 0px 0px 320px;">
    <div class="d-flex flex-wrap justify-content-start">
        <?php displayMovie($movie); ?>
    </div>
</div>

<?php require_once 'layout/footer.php';