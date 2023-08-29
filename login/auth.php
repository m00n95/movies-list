<?php
require_once __DIR__ . '/../classes/Utils.php';
require_once __DIR__ . '/../classes/ErrorCode.php';
require_once __DIR__ . '/../functions/getUser.php';
$user = getUser();

if (empty($_POST['email']) || empty($_POST['password'])) {
  Utils::redirect('login.php?error=' . ErrorCode::LOGIN_FIELDS_REQUIRED);
}

[
  'email' => $email,
  'password' => $password
] = $_POST;

// Authentification
if ($email !== $user['email'] || $password !== $user['password']) {
  Utils::redirect('login.php?error=' . ErrorCode::INVALID_CREDENTIALS);
}

session_start();
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['firstname'] = $user['firstname'];
Utils::redirect('/../homepage.php');