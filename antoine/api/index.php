<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_SERVER['PATH_INFO'])) {
    $root = explode('/', $_SERVER['PATH_INFO'])[1]; // [1] car explode retourne ['', 'etudiant', ...]
    $url = $_SERVER['PATH_INFO'];
} else {
    $root = 'default';
    $url = '/';
}

$data = [];
if(file_get_contents("php://input") != "") {
    $jsonData = file_get_contents("php://input");
    $data = json_decode($jsonData, true);
}

if (!file_exists('./ressources/'.$root.'/router.php')) { 
    echo 'Ressource not found !';
} 
else {
  require('./ressources/'.$root.'/router.php');
}

?>