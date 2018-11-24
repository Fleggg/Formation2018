<?php
if(isset($_GET['action']))
{
    switch ($_GET['action'])
    {
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
