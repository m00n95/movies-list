<?php
$pageTitle = "Modifier un film - Movie List";
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/ErrorCode.php';
require_once __DIR__ . '/../functions/getGenre.php';
require_once __DIR__ . '/../functions/getDbConnection.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('/index.php?error=' . ErrorCode::ACCESS_ERROR);
}

try {
$pdo = getDbConnection();
$genres = getGenre($pdo);
} catch (PDOException) {
    echo "Erreur lors de la récupération des données";
    exit;
}

$urlMovieId = $_GET['id'];
$urlName = $_GET['name'];
  
$uniqueGenres1 = array();
$uniqueGenres2 = array();

$stmt = $pdo->prepare(
"SELECT movies.*, genres.genre_name AS movie_genre
FROM movies
INNER JOIN movies_has_genres 
ON movies.id = movies_has_genres.movies_id
INNER JOIN genres 
ON genres.id = movies_has_genres.genres_id
WHERE movies_id=:movies_id");
$stmt->execute([
    'movies_id' => $urlMovieId,
    ]);
$movie = $stmt->fetchAll(PDO::FETCH_ASSOC);

$genre1 = $movie[0]['movie_genre'];
if (isset($movie[1]['movie_genre'])){
$genre2 = $movie[1]['movie_genre'];
}
?>

<h1 class="text-center mt-4">Modifier le film <?php echo $urlName; ?></h1>

<form style="margin: 20px 500px 50px 500px;" action="edit_movie.php?id=<?php echo $urlMovieId; ?>&name=<?php echo $urlName; ?>&genre1=<?php echo $genre1; ?>&genre2=<?php echo $genre2; ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="title" class="form-label">Titre du film</label>
    <input type="text" name="new_title" class="form-control" id="title" value="<?php echo $movie[0]['name'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="release_date" class="form-label">Date de sortie</label>
    <input type="date" name="new_release_date" class="form-control" id="release_date" value="<?php echo $movie[0]['release_date'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="picture" class="form-label">Affiche du film</label>
    <input type="file" name="new_picture" class="form-control" id="picture">
  </div>
  <div class="mb-3">
    <label for="summary" class="form-label">Résumé du film</label>
    <textarea name="new_summary" class="form-control" id="summary" required><?php echo $movie[0]['summary'] ?></textarea>
  </div>
  <div class="mb-3">
  <label for="summary" class="form-label">Choisissez un ou plusieurs genres pour le film</label>
  <select class="form-select" name="new_movie_genre1" required>
  <option selected value="<?php echo $genre1; ?>"><?php echo $genre1; ?></option>
    <?php foreach ($genres as $genre) {
      $genreName = $genre['genre_name'];
        if (!in_array($genreName, $uniqueGenres1)) { 
          array_push($uniqueGenres1, $genreName);?>
      <option value="<?php echo $genreName ?>"><?php echo $genreName ?></option>
    <?php } } ?>
  </select>
  <select class="form-select mt-3" name="new_movie_genre2">
  <?php //display the second genre if there is one set
    if (isset($genre2)){ ?>
  <option selected value="<?php echo $genre2; ?>">
    <?php echo $genre2; }
    else{ ?>
      Genre du film (2)
    <?php } ?>
  </option>
  <?php foreach ($genres as $genre) {
      $genreName = $genre['genre_name'];
        if (!in_array($genreName, $uniqueGenres2)) { 
          array_push($uniqueGenres2, $genreName);?>
      <option value="<?php echo $genreName ?>"><?php echo $genreName ?></option>
    <?php } } ?>
  </select>
  </div>
  <button type="submit" class="btn btn-secondary">Modifier</button>
</form>
<!-- Peut-être faire une erreur si les deux genres sont les mêmes -->

<?php require_once __DIR__ . '/../layout/footer.php';