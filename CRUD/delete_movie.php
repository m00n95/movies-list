<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../functions/getComment.php';
require_once __DIR__ . '/../functions/getDbConnection.php';
require_once __DIR__ . '/../functions/getGenre.php';
require_once __DIR__ . '/../functions/deleteComment.php';
require_once __DIR__ . '/../movie.php';

try {
$pdo = getDbConnection();
$comments = getComment($pdo);
$genres = getGenre($pdo);
} catch (PDOException) {
    echo "Erreur lors de la récupération des données";
    exit;
}

$movieId = $_GET['id'];
$urlName = $_GET['name'];

// Delete the comment if there is one
if ($commentFound == true)
{
    deleteComment($movieId);
}

// Find the picture 
$stmt = $pdo->prepare("SELECT picture FROM movies WHERE id=:movies_id");
$stmt->execute(['movies_id' => $movieId]);
$filename = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($filename);

// Delete the picture in '/images'
$imageFilePath = __DIR__ . '/../images/' . $filename['picture']; // Remplacez par le chemin réel de votre image
if (file_exists($imageFilePath)) {
    if (unlink($imageFilePath)) {
    } else {
        echo "Erreur lors de la suppression du fichier image.";
    }
} else {
    echo "Le fichier image n'existe pas.";
}

// Delete the genre 1 and genre 2 if there is one
$stmt = $pdo->prepare("DELETE FROM movies_has_genres WHERE movies_id=:movies_id");
$stmt->execute(['movies_id' => $movieId]);

// Delete the movie
$stmt = $pdo->prepare("DELETE FROM movies WHERE id=:movies_id");
$stmt->execute(['movies_id' => $movieId]);


Utils::redirect('/../movies.php');