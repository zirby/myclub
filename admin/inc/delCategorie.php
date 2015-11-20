<?php
    require_once 'conn.php';
    
    $id = $_GET['id'];
    
    $req = $pdo->prepare("DELETE FROM equipes WHERE id=? ");
    $req->execute([$id]);

    header('Location:../equipes.php');
    exit();
