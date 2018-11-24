<?php

class Prof implements JsonSerializable{

    private $id;
    private $nom;
    private $prenom;
    private $email;

    function __construct($id,$n,$p,$e) {
        $this->id = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $e;
    }
    
    public function jsonSerialize() {
        return array(
            "id"=>$this->id,
            "nom"=>$this->nom,
            "prenom"=>$this->prenom,
            "email"=>$this->email);
    }
}

?>