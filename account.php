<?php require 'inc/function.php'; 
session_start();

?>

<?php require 'inc/header.php'; ?>
<h1>Bonjour <?= $_SESSION['auth']->firstname; ?></h1>

<?php require 'inc/footer.php';
