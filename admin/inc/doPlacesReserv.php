<?php
$places = array();
$reserv = $_POST['NPreserve'];
$jour = $_POST['jour'];
$places = $_POST['selPlaces'];

$j = substr($jour, 3);

//print_r($places);


    require_once 'conn.php';
    foreach ($places as $place) {
        $req = $pdo->prepare("UPDATE cd16_places_".$j." SET spectateurs_id =?  WHERE id= ? ");
        $req->execute([$reserv, $place]);
    }
header('Location:../index.php');
    exit();