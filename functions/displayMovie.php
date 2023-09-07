<?php

/**
 * Undocumented function
 *
 * @param array $movies
 * @return void
 */
function displayMovie(array $movies): void
{
    foreach($movies as $movie) { 
      $urlId = $movie['id'];
      $urlName = $movie['name'];?>
        <div>
            <div class="card m-3" style="width: 16rem; ">
            <div class="img-size">
              <img src="/images/<?php echo $movie['picture']/*->getPicture()*/; ?>" class="card-img-top" alt="affiche de film">
            </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $movie['name']/*->getName()*/; ?></h5>
                <p class="card-text">Sortie : <?php echo $movie['release_date']/*->getReleaseDate()*/; ?></p>
                <div class="d-flex justify-content-between">
                  <a href="movie.php?id=<?php echo $movie['id']/*->getId()*/; ?>&name=<?php echo $movie['name']?>" class="btn btn-dark">Voir  plus</a>
                    <div class="d-flex align-items-center">
                      <a class="text-decoration-none" href="/CRUD/update_movie.php?id=<?php echo $urlId; ?>&name=<?php echo $urlName; ?>">&#9998</a>
                      <a class="text-decoration-none" href="/CRUD/delete_movie.php?id=<?php echo $urlId; ?>&name=<?php echo $urlName; ?>">&#128465</a>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <?php };
}