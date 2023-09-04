<?php 

function getGenre(PDO $pdo): array
{
    //require_once __DIR__ . '/../functions/getDbConnection.php';
    $stmt_genre = $pdo->query(
        "SELECT movies.*, genres.genre_name 
        FROM movies
        INNER JOIN movies_has_genres 
        ON movies.id = movies_has_genres.movies_id
        INNER JOIN genres 
        ON genres.id = movies_has_genres.genres_id");
    $genres = $stmt_genre->fetchAll(PDO::FETCH_ASSOC);
    return $genres;
}