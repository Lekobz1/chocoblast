<?php

class Roles{

    private $id;
    private $nom;

    function __construct($nom){
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getId(){
        return $this->id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }












}

?>