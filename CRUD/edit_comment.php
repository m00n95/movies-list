<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../functions/getDbconnection.php';

$urlMovieId = $_GET['id'];
$urlName = $_GET['name'];

$stmt = $pdo->prepare("UPDATE comments SET content=:new_content, rating=:new_rating, created_time=:new_created_time WHERE movies_id=:movies_id");
$stmt->execute([
    'new_content' => $_POST['new_content'],
    'new_rating' => $_POST['new_rating'],
    'new_created_time' => $_POST['new_created_time'],
    'movies_id' => $urlMovieId
]);

// Redirect directly to the movie with the new updated comment
Utils::redirect('/../movie.php?id=' . $urlMovieId . "&name=" . $urlName);