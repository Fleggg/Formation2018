<?php 

include('etudiant.class.php');

switch($url) {
    case '/'.$root:
        getAll();
        break;
    case '/'.$root.'/create':
        createEtudiant($data);
        break;
    case '/'.$root.'/delete':
        deleteEtudiant($data);
        break;
    default:
        echo "Error Etudiant : no match root !";
        break;
}

function getAll() {
    include('connect.php');
    
    try {
        $reponse = $bdd->query("SELECT * FROM etudiant");
        $reponse->execute();
        
        $etudiants = [];
    
        while ($e = $reponse->fetchObject(Etudiant::class)) {
            //$etudiant = new Etudiant($e['id'], $e['nom'], $e['prenom']);
            $etudiants[] = $e;
        }
        
        $message = ["success" => true, "data" => $etudiants];

        echo json_encode($message);
    
    } catch (Exception $e) {
    
        die('Erreur :'.$e->getMessage());
    }
}

function createEtudiant($data) {
    include('connect.php');
    
    try {
        $reponse = $bdd->prepare("INSERT INTO etudiant(nom, prenom) VALUES (:nom, :prenom)");
        $reponse->bindParam(':nom', $data["nom"], PDO::PARAM_STR);
        $reponse->bindParam(':prenom', $data["prenom"], PDO::PARAM_STR);
        $reponse->execute();

        echo true;
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}

function deleteEtudiant($data) {
    include('connect.php');
    
    try {
        $reponse = $bdd->prepare("DELETE FROM etudiant WHERE id = :id ");
        $reponse->bindParam(':id', $data["id"], PDO::PARAM_INT);
        $reponse->execute();

        echo true;
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
}

?>