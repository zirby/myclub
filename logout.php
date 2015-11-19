<?php

session_start();

unset($_SESSION['auth']);
setcookie('remember', NULL, -1);
$_SESSION['flash']['green'] = "Vous êtes maintenant déconnecté";
header('Location: index.php');
