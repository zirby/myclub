<?php
    require_once 'conn.php';
    
    $cat = $_GET['addCat'];
    $serie = $_GET['addSerie'];
    $capitaine = $_GET['addCapitaine'];
    $gsm = $_GET['addGsm'];
    
    
    $req = $pdo->prepare("INSERT INTO equipes SET equipe=?, serie=?, capitaine=?, gsm=?");
    $req->execute([$cat,$serie,$capitaine,$gsm ]);

