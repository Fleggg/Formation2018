<?php 

include('prof.class.php');

switch($url) {
    case '/'.$root:
        getProfs();
        break;
    case '/'.$root.'/delete':
        deleteProf($data);
        break;
    case '/'.$root.'/create':
        createProf($data);
        break;
    default:
        echo "Error Etudiant : no match root !";
        break;
}

function getProfs() {
    include('connect.php');

    $response=$bdd->query("SELECT * FROM professeur");
    $response->execute();
    $profs=[];
    while ($p=$response->fetch()){
        $profs[] = new Prof($p["id"],$p["nom"],$p["prenom"],$p["email"]);
    }
    echo json_encode($profs);
}

function createProf($data) {
    include('connect.php');

    try{
        $response=$bdd->prepare("INSERT INTO professeur(nom,prenom,email,id_cours) VALUES (:nom,:prenom,:email,1)");
        $response->bindParam(':nom',$data["nom"],PDO::PARAM_STR);
        $response->bindParam(':prenom',$data["prenom"],PDO::PARAM_STR);
        $response->bindParam(':email',$data["email"],PDO::PARAM_STR);
        $response->execute();

        echo true;
    }
    catch(Exception $e){
        echo false;
    }
}

function deleteProf($data) {
    include('connect.php');

    try {
        $response=$bdd->prepare("DELETE FROM professeur WHERE id=:id");
        $response->bindParam(':id',$data["id"],PDO::PARAM_INT);
        $response->execute();

        echo true;
    }
    catch(Exception $e){
        echo false;
    }
}


















?>