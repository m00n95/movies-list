<?php 

function getUser(): array
{
    require_once __DIR__ . '/../functions/getDbConnection.php';
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    return $users;
}