<?php
    require_once 'conn.php';
    
    $id = $_GET['updId'];
    $cat = $_GET['updCat'];
    $serie = $_GET['updSerie'];
    $capitaine = $_GET['updCapitaine'];
    $gsm = $_GET['updGsm'];
    
    
    $req = $pdo->prepare("UPDATE  equipes SET equipe=?, serie=?, capitaine=?, gsm=? WHERE id=?");
    $req->execute([$cat,$serie,$capitaine,$gsm,$id ]);

