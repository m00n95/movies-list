<?php
$pageTitle = "Ajouter un commentaire - Movie List";
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/ErrorCode.php';
require_once __DIR__ . '/../functions/getComment.php';
require_once __DIR__ . '/../functions/getDbConnection.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('/index.php?error=' . ErrorCode::ACCESS_ERROR);
}

try {
$pdo = getDbConnection();
$comments = getComment($pdo);
} catch (PDOException) {
    echo "Erreur lors de la récupération des données";
    exit;
}

$urlMovieId = $_GET['id'];
$urlName = $_GET['name'];
?>

<h1 class="text-center mt-4">Ajouter un nouveau commentaire pour <?php echo $urlName; ?></h1>

<form style="margin: 20px 500px 140px 500px;" action="add_comment.php?id=<?php echo $urlMovieId; ?>&name=<?php echo $urlName; ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="content" class="form-label">Contenu de votre commentaire</label>
    <textarea name="content" class="form-control" id="content" required></textarea>
  </div>
  <div class="mb-3">
    <label for="rating" class="form-label">Note du film (entre 0 et 10)</label>
    <input type="number" min="0" max="10" name="rating" class="form-control" id="rating" required>
  </div>
  <div class="mb-3">
    <label for="created_time" class="form-label">Date de création du commentaire</label>
    <input type="date" name="created_time" class="form-control" id="created_time" required>
  </div>
  <button type="submit" class="btn btn-secondary mt-2">Créer</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php';
