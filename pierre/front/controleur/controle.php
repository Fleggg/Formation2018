<?php
if(isset($_GET['action']))
{
    switch ($_GET['action'])
    {
        //////////////////////ETUDIANTS/////////////////
        case 'listEtudiant':
            require_once('modele/etudiant.crud.php');
            $etudiants = getAllEtudiant();
            include 'vue/etudiants.php';
            
            break;
            
        case 'createEtudiant':
            require_once('modele/etudiant.crud.php');
            $success = createEtudiant($_POST["nom"], $_POST["prenom"]);

            if($success == true) {
                $etudiants = getAllEtudiant();
                include 'vue/etudiants.php';
            }
            else {
                header('Location:index.php');
            }

        break;

        case 'deleteEtudiant':
            require_once('modele/etudiant.crud.php');
            
            $success = deleteEtudiant($_GET["id"]);
            
            if($success == true) {
                $etudiants = getAllEtudiant();
                include 'vue/etudiants.php';
            }
            else {
                header('Location:index.php');
            }

            break;
        
            //////////////////////PROFS/////////////////
        case 'listeProf':
            require_once('modele/prof.crud.php');
            $profs = getAllProfs();
            include 'vue/profs.php';
            break;
        case 'deleteProf':
            require_once('modele/prof.crud.php');
            //on vire l'étudiant
            $success=deleteProf($_GET["id"]);
            //on refresh la page
            if($success) {
                $profs=getAllProfs();
                include 'vue/profs.php';
            }
            else {
                die('Erreur :'.$e->getMessage());
            }
            break;
        case 'createProf':
            require_once('modele/prof.crud.php');
            //on ajoute le prof
            $success=createProf($_POST["nom"],$_POST["prenom"],$_POST["email"]);
            //on refresh la page
            if($success){
                $profs=getAllProfs();
                include 'vue/profs.php';
            }
            else {
                die('Erreur :'.$e->getMessage());
            }
            break;
        default:
            include 'vue/include/error.inc.php';
            break;
    }

            
}
else
{
    header('Location:index.php');
}

?>
