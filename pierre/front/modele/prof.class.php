<?php
    class Prof {
        private $id;
        private $prenom;
        private $nom;
        private $email;

        function __construct($id, $p, $n, $e) {
            $this->id = $id;
            $this->prenom = $p;
            $this->nom = $n;
            $this->email = $e;
        }

        function __get($attr){
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
                case "email":
                    return $this->email;
                    break;
                default:
                    return "C'EST TOUT CASSÉ ! (getter)";
                    break;
            }
        }
    }
?>