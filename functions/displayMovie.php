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
        <div class="col-3 mb-sm-4">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/<?php echo $movie->getPicture(); ?>" class="card-img-top" alt="affiche de film">
              <div class="card-body">
                <h5 class="card-title"><?php echo $movie->getName(); ?></h5>
                <p class="card-text"><?php echo $movie->getReleaseDate(); ?></p>
                <a href="#" class="btn btn-dark">Voir plus</a>
              </div>
            </div>
        </div>
        <?php };
}