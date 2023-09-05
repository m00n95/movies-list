<?php
$pageTitle = "Ajouter un film - Movie List";
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/footer.php';
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/ErrorCode.php';
require_once __DIR__ . '/../functions/getGenre.php';
require_once __DIR__ . '/../functions/getDbConnection.php';

if (!isset($_SESSION['firstname'])) {
  Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
}

try {
$pdo = getDbConnection();
$genres = getGenre($pdo);
} catch (PDOException) {
    echo "Erreur lors de la récupération des films";
    exit;
}

$uniqueGenres1 = array();
$uniqueGenres2 = array();
?>

<h1 class="text-center mt-4">Ajouter un nouveau film</h1>

<form style="margin: 20px 500px 0px 500px;" action="add_movie.php" method="POST" >
  <div class="mb-3">
    <label for="title" class="form-label">Titre du film</label>
    <input type="text" name="title" class="form-control" id="title">
  </div>
  <div class="mb-3">
    <label for="release_date" class="form-label">Date de sortie</label>
    <input type="date" class="form-control" id="release_date">
  </div>
  <div class="mb-3">
    <label for="picture" class="form-label">Affiche du film</label>
    <input type="file" name="picture" class="form-control" id="picture">
  </div>
  <div class="mb-3">
    <label for="summary" class="form-label">Résumé du film</label>
    <textarea name="summary" class="form-control" id="summary"></textarea>
  </div>
  <div class="mb-3">
  <label for="summary" class="form-label">Choisissez un ou plusieurs genres pour le film</label>
  <select class="form-select" name="movie_genre1">
  <option selected>Genre du film (1)</option>
    <?php foreach ($genres as $genre) {
      $genreName = $genre['genre_name'];
        if (!in_array($genreName, $uniqueGenres1)) { 
          array_push($uniqueGenres1, $genreName);?>
      <option value="<?php echo $genreName ?>"><?php echo $genreName ?></option>
    <?php } } ?>
  </select>
  <select class="form-select mt-3" name="movie_genre2">
  <option selected>Genre du film (2)</option>
  <?php foreach ($genres as $genre) {
      $genreName = $genre['genre_name'];
        if (!in_array($genreName, $uniqueGenres2)) { 
          array_push($uniqueGenres2, $genreName);?>
      <option value="<?php echo $genreName ?>"><?php echo $genreName ?></option>
    <?php } } ?>
  </select>
  </div>
  <button type="submit" class="btn btn-dark mt-2">Créer</button>
</form>
