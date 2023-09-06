<?php
$pageTitle = $_GET['name'] . " - Movie List";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Movie.php';
require_once 'functions/getMovie.php';
require_once 'functions/displayMovie.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'functions/getDbConnection.php';
require_once 'functions/getComment.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
}

try {
    $pdo = getDbConnection();
    $movies = getMovie();
    $comments = getComment();
} catch (PDOException) {
    echo "Erreur lors de la récupération des films";
    exit;
}

// Vérification d'erreur pour pouvoir interrompre le script au plus tôt
if (!isset($_GET['id'])) {
    http_response_code(400); // Bad Request
?> <h2>L'id est requis dans l'url</h2> <?php
        exit;
    }

    $urlName = $_GET['name'];

    $urlId = intval($_GET['id']);
    if ($urlId === 0) {
        http_response_code(400);
        ?> <h2>L'id est incorrect</h2> <?php
        exit;
    }

    foreach ($movies as $el) {
        if ($el['id']/*->getId()*/ === $urlId) {
            $movie = $el;
        }
    }

        if (!isset($movie)) {
    ?> <h2>Aucun film correspondant</h2> <?php
        } else { ?>

    <h1 class="text-center mt-4 text-decoration-underline"><?php echo $movie['name']/*->getName()*/; ?></h1>

    <div class="contain d-flex justify-content-around">
        <div>
            <img class="size-img" src="images/<?php echo $movie['picture']/*->getPicture()*/; ?>" alt="affiche de film">
        </div>
        <div class="content mt-4">
            <p>Date de sortie : <?php echo $movie['release_date']/*->getReleaseDate()*/; ?></p>
            <hr>
            <p><?php echo $movie['summary']/*->getSummary()*/; ?></p>
            <?php $commentFound = false; // to check if a comment was found for this movie
            foreach ($comments as $comment) {
                if (($comment['movies_id'] == $urlId)) {
                    $commentFound = true; ?>
                    <hr>
                    <h5>Note :</h5>                      
                    <p><?php echo $comment['rating'] ?>/10</p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5>Commentaire :</h5>
                        <div class="d-flex align-items-center">
                          <a class="text-decoration-none" href="/CRUD/update_comment.php?id=<?php echo $urlId; ?>&name=<?php echo $urlName; ?>">&#9998</a>
                          <a class="text-decoration-none" href="/CRUD/delete_comment.php?id=<?php echo $urlId; ?>">&#128465</a>
                        </div>
                    </div>
                    <p><?php echo $comment['content'] ?></p>
                    <p>Commentaire daté du <?php echo $comment['created_time'] ?></p>
                <?php } } if (!$commentFound) { ?>
                    <a href="/../CRUD/create_comment.php?id=<?php echo $urlId; ?>&name=<?php echo $urlName; ?>" class="btn btn-dark">Ajouter un commentaire</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>