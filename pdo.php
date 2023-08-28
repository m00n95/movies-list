<?php

try {
    //DSN = Data Source Name 
    $pdo = new PDO("mysql:host=host.docker.internal;port=3306;dbname=movies_list;charset=utf8mb4","root","");
} catch (PDOException)
{
    echo "La connexion à la bdd a échoué";
    exit;
}

// $users = $pdo->query("SELECT * FROM users");
// $movies = $pdo->query("SELECT * FROM movies");

// $user1 = $users->fetchAll(PDO::FETCH_ASSOC);
// $movie = $movies->fetchAll(PDO::FETCH_ASSOC);
// var_dump($user1);
// var_dump($movie);

/*
INSERT INTO movies (name,release_date,picture,summary) VALUES
("","","",""),
("","","",""),
("","","",""),
("","","",""),
("","","",""),
("","","",""),
("","","","");
*/