<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../functions/getDbconnection.php';

$urlMovieId = $_GET['id'];
$urlName = $_GET['name'];

$stmt = $pdo->prepare(
    "INSERT INTO comments (content, rating, created_time, users_id, movies_id) VALUES
    (:content, :rating, :created_time, :users_id, :movies_id)"
);

$stmt->execute([
    'content' => $_POST['content'],
    'rating' => $_POST['rating'],
    'created_time' => $_POST['created_time'],
    'users_id' => 1,
    'movies_id' => $urlMovieId
]);

// Redirect directly to the movie with the new comment
Utils::redirect('/../movie.php?id=' . $urlMovieId . "&name=" . $urlName);