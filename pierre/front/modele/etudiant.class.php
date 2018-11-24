<?php

class Etudiant {

    private $id;
    private $nom;
    private $prenom;

    function __construct($id, $n, $p) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
    }

    function __get($attr) {
        switch($attr) {
            case "id":
                return $this->id;
                break;
            case "prenom":
                return $this->prenom;
                break;
            case "nom":
                return $this->nom;
                break;
            default:
                return "Unknow";
                break;
        }
    }

    function __set($attr, $value) {
        switch($attr) {
            case "prenom":
                $this->prenom = $value;
                break;
            case "nom":
                $this->nom = $value;
                break;
            default:
                return "Unknow";
                break;
        }
    }

    function __toString() {
        return $this->id." - ".$this->prenom.' - '.$this->nom;
    }
}

/*  TEST CLASS ETUDIANT
$etudiant = new Etudiant(1,"Bisous", "Nours");

echo $etudiant;*/

?>