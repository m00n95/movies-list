<?php
require_once __DIR__ . '/../functions/getGenre.php';
require_once __DIR__ . '/../functions/getDbConnection.php';

try {
  $pdo = getDbConnection();
  $genres = getGenre($pdo);
  } catch (PDOException) {
      echo "Erreur lors de la récupération des films";
      exit;
  }

$uniqueGenres = array(); // To store unique genre names

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%; position: fixed;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="../movies.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Tous les films
            </a>
        </li>

        <?php foreach ($genres as $genre) {
            $genreName = $genre['genre_name'];
            if (!in_array($genreName, $uniqueGenres)) {
                // Check if the genre name is not already in the list
                array_push($uniqueGenres, $genreName); // Add to the list of unique genre names ?>
                <li class="nav-item">
                    <a href="genre.php?genre_name=<?php echo $genreName; ?>" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        <?php echo $genreName; ?>
                    </a>
                </li>
        <?php } } ?>
    </ul>
</div>