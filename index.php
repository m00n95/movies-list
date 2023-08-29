<?php
$pageTitle = "Movie List";
$pageStyle = "../assets/styles.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';

// Message d'erreur si on essaye d'accédez à une page sans être connecté
if (isset($_GET['error'])) { ?>
  <div class="error text-center mb-3">
    <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
  </div>
<?php } ?>