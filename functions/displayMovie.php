<?php

/**
 * Undocumented function
 *
 * @param Movie[] $movies
 * @return void
 */
function displayMovie(array $movies): void 
{
    foreach($movies as $movie) { ?>
        <div>
            <div class="card m-3" style="width: 16rem; ">
            <div class="img-size">
              <img src="assets/img/<?php echo $movie->getPicture(); ?>" class="card-img-top" alt="affiche de film">
            </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $movie->getName(); ?></h5>
                <p class="card-text"><?php echo $movie->getReleaseDate(); ?></p>
                <a href="movie.php?id=<?php echo $movie->getId(); ?>" class="btn btn-dark">Voir plus</a>
              </div>
            </div>
        </div>
        <?php };
}