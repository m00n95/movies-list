<?php
$pageTitle = "Editer le commentaire - Movie List";
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/footer.php';
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

$stmt = $pdo->prepare("SELECT * FROM comments WHERE movies_id=:movies_id");
$stmt->execute([
    'movies_id' => $urlMovieId,
    ]);
$comment = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1 class="text-center mt-4">Modifier le commentaire pour <?php echo $urlName; ?></h1>

<form style="margin: 20px 500px 0px 500px;" action="edit_comment.php?id=<?php echo $urlMovieId; ?>&name=<?php echo $urlName; ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="content" class="form-label">Contenu de votre commentaire</label>
    <textarea name="new_content" class="form-control" id="content" required><?php echo $comment['content'] ?></textarea>
  </div>
  <div class="mb-3">
    <label for="rating" class="form-label">Note du film (entre 0 et 10)</label>
    <input type="number" min="0" max="10" name="new_rating" class="form-control" id="rating" value="<?php echo $comment['rating'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="created_time" class="form-label">Date de modification du commentaire</label>
    <input type="date" name="new_created_time" class="form-control" id="created_time" value="<?php echo $comment['created_time'] ?>" required>
  </div>
  <button type="submit" class="btn btn-dark mt-2">Editer</button>
</form>