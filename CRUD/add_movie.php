<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../functions/getDbconnection.php';

if (isset($_FILES['picture'])) {
    $file = $_FILES['picture'];
    $filename = $file['name'];
    $destination = __DIR__ . '/../images/' . $filename;
    move_uploaded_file($file['tmp_name'], $destination);
}

$stmtMovie = $pdo->prepare(
    "INSERT INTO movies (name, release_date, picture, summary) VALUES
    (:name, :release_date, :picture, :summary)"
);

$stmtMovie->execute([
    'name' => $_POST['title'],
    'release_date' => $_POST['release_date'],
    'picture' => $filename,
    'summary' => $_POST['summary']
]);


$stmtGenre = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :movie_genre1");

$stmtGenre->execute([
    'movie_genre1' => $_POST['movie_genre1']
    ]);
$genreId1 = $stmtGenre->fetch(PDO::FETCH_ASSOC);


$stmtMovieId = $pdo->prepare("SELECT id FROM movies WHERE name LIKE :name");

$stmtMovieId->execute([
    'name' => $_POST['title']
    ]);
$movieId = $stmtMovieId->fetch(PDO::FETCH_ASSOC);


$stmt = $pdo->prepare(
    "INSERT INTO movies_has_genres (movies_id, genres_id) VALUES
    (:movies_id, :genres_id1)"
);

$stmt->execute([
    'movies_id' => $movieId['id'],
    'genres_id1' => $genreId1['id']
]);

// Check if $_POST['movie_genre2'] is not empty so that it can add another genre
if (!empty($_POST['movie_genre2'])) {
$stmtGenre = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :movie_genre2");

$stmtGenre->execute([
    'movie_genre2' => $_POST['movie_genre2']
    ]);
$genreId2 = $stmtGenre->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare(
    "INSERT INTO movies_has_genres (movies_id, genres_id) VALUES
    (:movies_id, :genres_id2)"
);

$stmt->execute([
    'movies_id' => $movieId['id'],
    'genres_id2' => $genreId2['id']
]);
}

Utils::redirect('/../movies.php');