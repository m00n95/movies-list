<?php 

function getComment(): array
{
    require_once __DIR__ . '/../functions/getDbConnection.php';
    global $pdo;
    $stmt_comments = $pdo->query("SELECT * FROM comments");
    $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}