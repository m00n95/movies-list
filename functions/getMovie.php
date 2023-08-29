<?php 

function getMovie(): array
{
    require_once 'getDbConnection.php';
    $stmt = $pdo->query("SELECT * FROM movies");
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $movies;


    // création d'objets Movie pour exemple avant connexion à la bdd
    /*return 
    [
        new Movie(16, "curve", "6/26/2086", "dragon.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(79, "capital", "12/9/2060", "dune.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(54, "baseball", "9/21/2058", "goonies.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(91, "factor", "9/17/2105", "harry-potter.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(51, "advice", "6/10/2074", "chihiro.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(87, "clock", "7/22/2102", "inception.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(36, "fly", "3/15/2076", "mission-impossible.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(14, "higher", "6/9/2037", "fast-furious.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(65, "written", "10/24/2043", "star-wars.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(64, "lovely", "2/3/2024", "gardiens-galaxie.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(2, "recent", "9/20/2097", "parasite.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(92, "anyone", "3/1/2102", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(59, "death", "10/2/2090", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(71, "surface", "9/17/2112", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(57, "receive", "7/5/2119", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(77, "inch", "5/13/2062", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(13, "rate", "7/16/2091", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(3, "toward", "7/31/2103", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(37, "breathe", "9/24/2051", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(88, "hollow", "8/7/2052", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(45, "stretch", "4/28/2097", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit."), 
        new Movie(61, "grow", "2/23/2058", ".jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit.")
    ];*/
}