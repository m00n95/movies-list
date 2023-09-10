<?php
$pageTitle = "Movie List";
require_once 'layout/header.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';

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

<div style="background-image: url('/images/film.jpg'); height:675px;">
  <h1 class="text-center pt-4">Bienvenue sur Movie List !</h1>
  <p class="pt-4" style="font-size: 20px; margin-left: 40px;">Le site qui vous aide à gardez une trace des films que vous aimez !</p>
  <p style="font-size: 20px; margin-left: 40px;">Connectez-vous dès maintenant pour accéder à vos films.</p>
  <a href="/login/login.php"><button class="btn btn-secondary" style="font-size: 18px; margin-left: 40px;">Connexion</button></a>
</div>

<?php require_once 'layout/footer.php';