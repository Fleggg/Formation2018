<?php
include('config.php');
require_once('etudiant.class.php');

function getAllEtudiant() {
    //  http://localhost:3200/ --> Lien vers l'api
    $path = Api::gePath()."/etudiants";

    // Envoie d'une requête de type GET
    $response = json_decode(file_get_contents($path), true);
    
    $etudiants = [];
    if($response['success'] == true) {
        //  Transformation des objets de type stdclass en objet Etudiant
        foreach($response['data'] as $e) {
            $etudiants[] = new Etudiant($e["id"], $e["nom"], $e["prenom"]);
        }
        return $etudiants;
    }
}

function createEtudiant($nom, $prenom) {
    $path = Api::gePath()."/etudiants/create";
    
    $postdata = array (
        "nom" => $nom,
        "prenom" => $prenom
    );
    
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    
    $context  = stream_context_create($opts);
    
    $success = file_get_contents($path, false, $context);
    
    return $success;
}

function deleteEtudiant($id) {
    $path = Api::gePath()."/etudiants/delete";
    
    $postdata = array (
        "id" => $id
    );
    
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    
    $context  = stream_context_create($opts);
    
    $success = file_get_contents($path, false, $context);
    
    return $success;
}

//////////////////////PROFS/////////////////
include_once('prof.class.php');

function getAllProfs(){
    $path=Api::gePath()."/profs";
    $response = json_decode(file_get_contents($path), true);
    $profs=[];

    foreach ($response as $p) {
        $profs[]=new Prof($p["id"],$p["prenom"],$p["nom"],$p["email"]);
    }
    return $profs;
}

function deleteProf($id) {
    $path=Api::gePath()."/profs/delete";
    $postdata=array("id" => $id);
    $opts=array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    $context=stream_context_create($opts);
    $success=file_get_contents($path,false,$context);
    return $success;
}

function createProf($nom, $prenom, $email) {
    $path=Api::gePath()."/profs/create";
    $postdata=array (
        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $email
    );
    $opts=array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($postdata)
        )
    );
    $context=stream_context_create($opts);
    $success=file_get_contents($path, false, $context);
    return $success;
}

?>