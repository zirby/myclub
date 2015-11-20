<?php

$reserv = $_GET['reserv'];
$dtEnvoyele = $_GET['envoyele'];
echo $dtEnvoyele;
    require_once 'conn.php';
    $req = $pdo->prepare("UPDATE cd16_reservations SET envoye_le =? WHERE id= ? ");
    $rs = $req->execute([$dtEnvoyele, $reserv]);
if ($rs){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>$sql));
}
