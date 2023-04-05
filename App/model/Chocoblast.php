<?php


class Chocoblast{

    private $id_chocoblast;
    private $slogan_chocoblast;
    private $date_chocoblast;
    private $statut_chocoblast;
    private $cible_chocoblast;
    private $auteur_chocoblast;

    function __construct($slogan_chocoblast, $date_chocoblast, $cible_chocoblast, $auteur_chocoblast){
        $this->slogan_chocoblast = $slogan_chocoblast;
        $this->date_chocoblast = $date_chocoblast;
        $this->cible_chocoblast = $cible_chocoblast;
        $this->auteur_chocoblast = $auteur_chocoblast;
    }

    public function getId(){
        return $this->id_chocoblast;
    }

    public function getSlogan(){
        return $this->slogan_chocoblast;
    }

    public function getDate(){
        return $this->date_chocoblast;
    }

    public function getStatut(){
        return $this->statut_chocoblast;
    }

    public function getCible(){
        return $this->cible_chocoblast;
    }

    public function getAuteur(){
        return $this->auteur_chocoblast;
    }

    public function setSlogan($slogan_chocoblast){
        $this->slogan_chocoblast = $slogan_chocoblast;
    }

    public function setDate($date_chocoblast){
        $this->date_chocoblast = $date_chocoblast;
    }

    public function setStatut($statut_chocoblast){
        $this->statut_chocoblast = $statut_chocoblast;
    }

    public function setCible($cible_chocoblast){
        $this->cible_chocoblast = $cible_chocoblast;
    }

    public function setAuteur($auteur_chocoblast){
        $this->auteur_chocoblast = $auteur_chocoblast;
    }


    
}







?>