<?php

function getDbConnection(): PDO
{
  $dbSettings = parse_ini_file(__DIR__ . '/../db.ini');
  [
    'DB_HOST' => $host,
    'DB_PORT' => $port,
    'DB_NAME' => $dbname,
    'DB_CHARSET' => $charset,
    'DB_USER' => $user,
    'DB_PASSWORD' => $password
  ] = $dbSettings;

  // DSN = Data Source Name
  $pdo = new PDO(
    "mysql:host=$host;
    port=$port;
    dbname=$dbname;
    charset=$charset",
    $user,
    $password);
    return $pdo;
    
}

try{
  $pdo = getDbConnection();
} catch (PDOException)
{
    http_response_code(500);
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