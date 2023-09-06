<?php 

function deleteComment($movieId): void
{
    require_once __DIR__ . '/../functions/getDbConnection.php';
    require_once __DIR__ . '/../functions/getComment.php';
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM comments WHERE movies_id=:movies_id");
    $stmt->execute(['movies_id' => $movieId]);
}