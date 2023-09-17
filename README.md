# PHP - Projet Movies List

## Présentation du projet

Mon projet est un site fait en PHP où l'utilisateur pourra ajouter des films de son choix pour se créer une liste personnel de films qu'il a apprécié. 

Après s'être identifié, l'utilisateur auras accès au site, il se retrouvera sur la page d'accueil où l'on peut trouver une rapide présentation du site. Depuis cette page, ainsi que depuis la barre de navigation, il pourra accéder à la page de création de films ([page de création](CRUD/create_movie.php)), et également à la page où l'on peut retouver tous les films ajoutés ([page des films](movies.php)). <br>
A part la création de nouveaux films, l'utilisateur pourra aussi modifier ses films. Leurs ajouter un commentaire et une note, et modifier ce commentaire.

## Configuration de la base de données

Pour configurer votre base de données vous aurez besoin de créer un fichier `db.ini` à la racine. <br>
Vous trouverez un modèle dans le fichier [db.ini.template](db.ini.template) ou ci-dessous :

```
DB_HOST="localhost"
DB_PORT=3306
DB_NAME="dbname"
DB_CHARSET="utf8mb4"
DB_USER="user"
DB_PASSWORD="password" 
```

Ensuite pour créer la base de données il y a le script sql que vous pouvez retrouvez dans le fichier [db.sql](db.sql). Dedans il y a déjà quelques films pour que le site ne sois pas vide, mais il est évidemment possible de les effacer pour en mettre d'autres selon vos préférences.

## Layout

Pour le site j'ai décidé de réunir le header, footer et une sidebar dans un seul dossier [layout](layout).

### Header
Pour la navebar du header, j'ai décidé de mettre le logo du site et un bouton de connexion lorsque l'utilisateur arrive sur le site. Puis lorsqu'il est connecté, il aura accès aux liens des autres pages grâce à un petit bout de code plutôt simple :
```
<?php if (isset ($_SESSION['password'])) { ?>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="../homepage.php">&#10148; Accueil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../movies.php">&#128253; Films</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/../CRUD/create_movie.php">&#10010; Ajouter un film</a>
    </li> 
  </ul>
<?php } ?>
```
J'ai également ajouté ce `if` au lien du logo qui amène vers la page d'accueil seulement si on est connecté.

### Sidebar

Pour la page de films, j'ai décidé d'ajouter une sidebar où l'on pourrait retrouver les différents genres des films pour accédez à chacun des films liés à ceux-ci. Au début grâce à un `foreach` j'ai bien réussi à afficher les genres mais ceux-ci ne s'affichaient pas qu'une seule fois. Donc j'ai ensuite décidé de les mettre dans un tableau au fur et à mesure pour ensuite les utilisés qu'une seule fois :

```
$uniqueGenres = array(); // To store unique genre names

<?php foreach ($genres as $genre) {
    $genreName = $genre['genre_name'];
    if (!in_array($genreName, $uniqueGenres)) {
        // Check if the genre name is not already in the list
        array_push($uniqueGenres, $genreName); // Add to the list of unique genre names ?>
        <li class="nav-item">
            <a href="genre.php?genre_name=<?php echo $genreName; ?>" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                <?php echo $genreName; ?>
            </a>
        </li>
<?php } } ?>
```

## Classes

Je n'ai malheureusement pas pu utiliser les classes autant que je le voulais mais j'en ai tout de même fais trois.

- **[Movie](classes/Movie.php)** : Au départ, je n'avais pas encore créé ma base de données donc j'ai décidé de faire des objets *Movie* pour avoir quelques données d'exemple en local pour pouvoir tester l'affichage de celles-ci.

- **[Utils](classes/Utils.php)** : Cette classe a été créé à la base pour que je puisse y mettre des fonctions qui me seront utiles tout au long du projet. Bon finalement il n'y a qu'une seule fonction dedans car je n'ai pas trop eu le temps de factoriser mon code. C'est une fonction qui m'aide pour la redirection des pages et elle m'a été très utile car je l'ai beaucoup utilisé pour le coup.

- **[ErrorCode](classes/ErrorCode.php)** : Pour la gestion des erreurs j'avais décidé de créer cette classe. Encore une fois je n'ai pas pu optimiser au maximum, et j'ai seulement pu faire la gestion d'erreur par rapport au login. Il y en a deux que j'ai utilisé pour [l'authentification](login/auth.php) dans les cas où les identifiants ne sont pas rentrés ou bien si ils ne sont pas bons. Et ensuite j'ai fais une erreur dans le cas où un utilisateur non-connecté essaie d'accéder aux pages du site. J'ai rentré le petit bout de code suivant dans chaques pages du site :
```
if (!isset($_SESSION['firstname'])) 
{
  Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
}
```

## Functions

Tout au long du projet j'ai fais des [fonctions](functions) pour avoir accès à certaines données en particuliers, ainsi qu'une fonction pour afficher un film et pour effacer un commentaire.

Pour commencer, j'ai fait une [fonction](functions/getDbconnection.php) pour me lier à ma base de données, et qui fait appel à ce que vous aurez rempli dans votre fichier `db.ini` grâce à la fonction `parse_ini_file` de la SPL. Ensuite, lorsque j'avais besoin de certaines données, j'ai créé d'autres fonctions *get* pour pouvoir faire la bonne requête SQL. Je n'ai pas pu le mettre en place mais j'avais également pensé à mettre ces fonctions dans une classe en tant que fonctions statiques pour pouvoir les appeler plus facilement.

Pour afficher un film j'ai créé la fonction [displayMovie](functions/displayMovie.php) qui fera appel à un tableau de `$movies`, qui lui même sera défini grâce à la fonction [getMovie](functions/getMovie.php) qui récupère tous les films de la base de données. Ensuite grâce à une `card` faite avec *Bootstrap*, j'affiche le film en appelant le bon élément au bon endroit.

J'ai donc également fait une fonction [deleteComment](functions/deleteComment.php) qui comme son nom l'indique sert à effacer les commentaires. Je l'ai créé car je l'utilise évidemment pour [effacer un commentaire](CRUD/delete_comment.php) mais je l'utilise aussi quand je dois [effacer un film](CRUD/delete_movie.php) mais que j'ai besoin d'effacer un commentaire avant pour que ce soit plus simple.

## Landing Page

[landing page](index.php)

Lorsque l'on arrive sur le site, on se retrouve sur une page où l'on peut accéder à la connexion et où l'on se retrouve aussi si on essaye d'accéder à l'une des autres pages du site sans être connecté. Si on est déjà connecté, on se retrouve directement sur la page d'accueil du site.

```
// Message d'erreur si on essaye d'accédez à une page sans être connecté
if (isset($_GET['error'])) { ?>
  <div class="error text-center mb-3">
    <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
  </div>
<?php } 

// Si on est déjà connecté, redirection vers la page d'accueil
if (isset($_SESSION['password'])) {
  Utils::redirect('homepage.php');
}
?>
```

## Accueil

[page d'accueil](homepage.php)

Après s'être connecté, on arrive sur cette page plutôt simple où l'on trouvera une petite présentation du site et un lien pour aller créer des films. Ainsi qu'une partie avec les 5 derniers films ajoutés par l'utilisateur.

## Films

[page des films](movies.php)

Cette page regroupe tous les films ajoutés par l'utilisateur. <br>
Pour les afficher, je fais appel à la fonction [displayMovie](functions/displayMovie.php) où j'ai créer une `card` unique pour tous les films quand ils s'affichent. Et pour utiliser cette fonction, j'ai aussi utilisé une autre fonction [getMovie](functions/getMovie.php) pour pouvoir chercher mes films dans ma base de données. <br>
(Avant le lien avec la bdd, j'avais utilisé ma classe [Movie](classes/Movie.php) pour créer directement mes films et les mettre dans un tableau que je mettais dans ma première fonction pour les afficher.)

Mais aussi comme indiqué précédemment, une sidebar qui lie les [pages genre](genre.php) avec leur films correspondant.

## CRUD

### Create

Pour les [films](CRUD/create_movie.php) et les [commentaires](CRUD/create_comment.php) j'ai fais une page de création à l'aide d'un formulaire.

Pour la [création de films](CRUD/add_movie.php) j'ai eu un peu de problème avec le fait que je voulais que l'utilisateur puisse choisir si il voulait ajouter un ou deux genres au films mais j'ai finalement réussi grâce à un `if` :

```
// Check if $_POST['movie_genre2'] is not empty so that it can add another genre
if (!empty($_POST['movie_genre2'])) {
$stmtGenre = $pdo->prepare("SELECT id FROM genres WHERE genre_name LIKE :movie_genre2");

$stmtGenre->execute([
    'movie_genre2' => $_POST['movie_genre2']
    ]);
$genreId2 = $stmtGenre->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare(
    "INSERT INTO movies_has_genres (movies_id, genres_id) VALUES
    (:movies_id, :genres_id2)"
);

$stmt->execute([
    'movies_id' => $movieId['id'],
    'genres_id2' => $genreId2['id']
]);
}
```

Ensuite pour la [création de commentaires](CRUD/add_comment.php) c'était plus simple car je n'ai pas eu le problème des genres et de la condition donc le fait d'avoir fais les films avant m'a bien aidé.

### Delete

Pour effacer les [commentaires](CRUD/delete_comment.php) je n'ai pas vraiment eu de problèmes c'était assez simple. <br>
Cependant pour effacer les [films](CRUD/delete_movie.php) j'ai eu un peu de souci car je voulais aussi effacer le fichier image directement lié au dossier [d'images](images). J'ai finalement réussi grâce à des fonctions de la SPL et un peu d'aide de ChatGPT :

```
// Delete the picture in '/images'
$imageFilePath = __DIR__ . '/../images/' . $filename['picture']; 
if (file_exists($imageFilePath)) {
    if (unlink($imageFilePath)) {
    } else {
        echo "Erreur lors de la suppression du fichier image.";
    }
} else {
    echo "Le fichier image n'existe pas.";
}
```

### Update

Pour les modifications des [films](CRUD/update_movie.php) et des [commentaires](CRUD/update_comment.php) je n'ai pas trop eu de souci car j'ai repris les formulaires que j'avais fait pour la création et je les ai adpaté en remplissant la `value` avec les informations à modifier. La seule chose que je n'ai pas pu améliorer c'est que j'ai fait les requêtes SQL directement avant les formulaires mais je voulais les mettre autre part, par exemple dans une fonction. <br>
Ensuite pour [modifier les films](CRUD/edit_movie.php) j'ai juste encore eu un petit souci si je voulais effacer la photo du film si elle avait été modifié, mais j'ai réussi :
```
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
```
Enfin, pour [modifier les commentaires](CRUD/edit_comment.php) c'était simple car il n'y avait rien de compliqué à changer.
## Améliorations

Il y a pas mal d'améliorations que je pourrais faire mais je n'ai pas forcément eu le temps.

Tout d'abord j'aurais peut-être pu améliorer mon [README](README.md) car je ne suis pas sure d'avoir mis tout ce qu'il fallait dedans. De plus, pour la gestion des erreurs je n'ai pas pu l'optimiser au maximum donc il y a beaucoup d'erreurs dont j'aurais pu m'occuper. Et enfin la factorisation de mon code, j'aurais pu mettre certaines fonctions dans des classes pour les utiliser plus simplement et aussi remettre certains bouts de code dans de meilleurs endroits. <br>
Je suis quand même contente de ce que j'ai pu faire et j'ai appris plein de choses utiles !

