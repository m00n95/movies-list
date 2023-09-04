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
  ?>


<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%; position: fixed;">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../movies.php" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Tous les films
        </a>
      </li>

      <?php foreach ($genres as $genre) { ?>
          <li class="nav-item">
            <a href="genre.php?genre_name=<?php echo $genre['genre_name']; ?>" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              <?php echo $genre['genre_name']; ?>
            </a>
          </li>
        <?php } ?>
      
    </ul>
  </div>