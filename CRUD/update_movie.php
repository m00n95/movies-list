<?php
$pageTitle = "Modifier un film - Movie List";
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/footer.php';
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/ErrorCode.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
  }