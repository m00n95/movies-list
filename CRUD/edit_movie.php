<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../functions/getDbconnection.php';

$urlMovieId = $_GET['id'];
$urlName = $_GET['name'];
$genre1 = $_GET['genre1'];
if (isset($_GET['genre2'])){
$genre2 = $_GET['genre2'];
}

if (isset($_FILES['new_picture'])) {
    $file = $_FILES['new_picture'];
    $filename = $file['name'];
    $destination = __DIR__ . '/../images/' . $filename;
    move_uploaded_file($file['tmp_name'], $destination);

    // Delete the old picture if it exists
    $stmt = $pdo->prepare("SELECT picture FROM movies WHERE id=:movies_id");
    $stmt->execute([
        'movies_id' => $urlMovieId
    ]);
    $oldPicture = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!empty($oldPicture['picture'])) {
        $oldPicturePath = __DIR__ . '/../images/' . $oldPicture['picture'];
        if (file_exists($oldPicturePath)) {
            unlink($oldPicturePath);
        }
    }
}

if (!empty($filename)) {
    $stmt = $pdo->prepare("UPDATE movies SET picture=:new_picture WHERE id=:movies_id");
    $stmt->execute([
        'new_picture' => $filename,
        'movies_id' => $urlMovieId
    ]);
}


$stmt = $pdo->prepare("UPDATE movies SET name=:new_title, release_date=:new_release_date, summary=:new_summary WHERE id=:movies_id");
$stmt->execute([
    'new_title' => $_POST['new_title'],
    'new_release_date' => $_POST['new_release_date'],
    'new_summary' => $_POST['new_summary'],
    'movies_id' => $urlMovieId
]);


$stmt = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :new_movie_genre1");
$stmt->execute([
    'new_movie_genre1' => $_POST['new_movie_genre1']
]);
$newGenre1 = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :genre1");
$stmt->execute([
    'genre1' => $genre1
]);
$genre1Id = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("UPDATE movies_has_genres SET genres_id=:new_genre1 WHERE movies_id=:movies_id AND genres_id=:genre1");
$stmt->execute([
    'new_genre1' => $newGenre1['id'],
    'movies_id' => $urlMovieId,
    'genre1' => $genre1Id['id']
]);


if (isset($_POST['new_movie_genre2']))
{
    $stmt = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :new_movie_genre2");
    $stmt->execute([
        'new_movie_genre2' => $_POST['new_movie_genre2']
    ]);
    $newGenre2 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :genre2");
    $stmt->execute([
        'genre2' => $genre2
    ]);
    $genre2Id = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = $pdo->prepare("UPDATE movies_has_genres SET genres_id=:new_genre2 WHERE movies_id=:movies_id AND genres_id=:genre2");
    $stmt->execute([
        'new_genre2' => $newGenre2['id'],
        'movies_id' => $urlMovieId,
        'genre2' => $genre2Id['id']
    ]);
}


Utils::redirect('/../movies.php');