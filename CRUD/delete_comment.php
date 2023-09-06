<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../functions/getComment.php';
require_once __DIR__ . '/../functions/getDbConnection.php';
require_once __DIR__ . '/../functions/deleteComment.php';

try {
$pdo = getDbConnection();
$comments = getComment($pdo);
} catch (PDOException) {
    echo "Erreur lors de la récupération des données";
    exit;
}

$movieId = $_GET['id'];
$urlName = $_GET['name'];

deleteComment($movieId);

Utils::redirect('/../movie.php?id=' . $movieId . "&name=" . $urlName);