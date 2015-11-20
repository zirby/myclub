<?php
//$pdo = new PDO('mysql:dbname=tcstandamembre;host=tcstandamembre.mysql.db', 'tcstanda', 'Tcstanda4032');
$pdo = new PDO('mysql:dbname=tcstandamembre;host=localhost', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
