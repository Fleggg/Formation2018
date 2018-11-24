<?php

$host = "localhost";
$util = "root";
$password = "";
$bdd = "baseetudiant";

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host='.$host.';dbname='.$bdd, $util, $password, $pdo_options);
}
catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}
