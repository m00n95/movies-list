<?php
$pageStyle = '/../assets/style_login.css' ;
$pageTitle = 'Connexion - Movie List';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../classes/ErrorCode.php';
?>

<h1 class="text-center mt-3">Connexion</h1>

<?php if (isset($_GET['error'])) { ?>
  <div class="error text-center mb-3">
    <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
  </div>
<?php } ?>

<div class="d-flex justify-content-center ">
<form action="auth.php" method="post">
  <div class="mb-3 col-12">
    <label for="email" class="form-label">Email :</label>
    <input type="text" class="form-control" name="email" id="email" />
  </div>
  <div class="mb-3 col-12">
    <label for="password" class="form-label">Mot de passe :</label>
    <input type="password" class="form-control" name="password" id="password" />
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="checkbox">
    <label class="form-check-label" for="checkbox">Je suis un robot</label>
  </div>
  <button type="submit" class="btn btn-dark">Se connecter</button>
</form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php';