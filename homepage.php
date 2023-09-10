<?php
$pageTitle = "Accueil - Movie List";
require_once 'layout/header.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'functions/getDbConnection.php';
require_once 'functions/displayMovie.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
}

try {
$pdo = getDbConnection();
} catch (PDOException) {
    echo "Erreur lors de la récupération des données";
    exit;
}

$stmt = $pdo->query("SELECT * FROM movies ORDER BY id DESC LIMIT 5");
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="text-center mt-4">Movie List</h1>

<h2>Présentation</h2>

<div style="margin-left: 50px; margin-right: 50px;">
  <p>Bienvenue sur Movie List, le site pour gardez une trace des films que vous avez vu. <br>
   Sur ce cite vous pourrez ajouter vos propres films et les modifier si besoin. De plus, pour chacun de vos films vous aurez l'occasion d'ajouter un commentaire accompagné d'une note de votre choix.</p>
  <p>Commencez dès maintenant votre liste de films !</p>
  <a href="/CRUD/create_movie.php"><button class="btn btn-secondary">Ajouter un film !</button></a>
</div>

<h2 class="mt-5">Vos derniers films ajoutés</h2>

<div style="margin: 10px 0px 10px 35px;">
    <div class="d-flex flex-wrap justify-content-start">
        <?php displayMovie($movies); ?>
    </div>
</div>

<div class="d-flex justify-content-center mb-5">
  <a href="/movies.php"><button class="btn btn-secondary">Voir plus de films</button></a>
</div>

<?php require_once 'layout/footer.php';