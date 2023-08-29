<?php 

function getUser(): array
{
    require_once 'getDbConnection.php';
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetch(PDO::FETCH_ASSOC);
    return $users;
}