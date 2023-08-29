<?php
$pageTitle = "Accueil - Movie List";
$pageStyle = "../assets/style_homepage.css";
require_once 'layout/header.php';
require_once 'layout/footer.php';
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';

if (!isset($_SESSION['firstname'])) {
    Utils::redirect('index.php?error=' . ErrorCode::ACCESS_ERROR);
  }
