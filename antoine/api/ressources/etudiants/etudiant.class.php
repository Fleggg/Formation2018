<?php

class Etudiant implements JsonSerializable {

    private $id;
    private $nom;
    private $prenom;

    function __construct() {

    }

    /*
    *   Permet le json_encode avec des attributs privée
    */
    public function jsonSerialize() {
        return array(
            "id" => $this->id, 
            "nom" => $this->nom, 
            "prenom" => $this->prenom);
    }
}

?>