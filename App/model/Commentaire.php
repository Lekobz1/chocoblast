<?php


class Commentaire{

    private $id_commentaire;
    private $note_commentaire;
    private $text_commentaire;
    private $statut_commentaire;
    private $date_commentaire;
    private $auteur_chocoblast;
    private $chocoblast_commentaire;

    function __construct($note_commentaire, $text_commentaire, $date_commentaire, $auteur_chocoblast,$chocoblast_commentaire){
        $this->note_commentaire = $note_commentaire;
        $this->text_commentaire = $text_commentaire;
        $this->date_commentaire = $date_commentaire;
        $this->auteur_chocoblast = $auteur_chocoblast;
        $this->$chocoblast_commentaire = $chocoblast_commentaire;
    }

    public function getId(){
        return $this->id_commentaire;
    }

    public function getNote(){
        return $this->note_commentaire;
    }

    public function getText(){
        return $this->text_commentaire;
    }

    public function getStatut(){
        return $this->statut_commentaire;
    }

    public function getDate(){
        return $this->date_commentaire;
    }

    public function getAuteur(){
        return $this->auteur_chocoblast;
    }

    public function getChocoblast(){
        return $this->chocoblast_commentaire;
    }




    public function setSlogan($text_commentaire){
        $this->text_commentaire = $text_commentaire;
    }

    public function setDate($date_commentaire){
        $this->date_commentaire = $date_commentaire;
    }

    public function setStatut($statut_commentaire){
        $this->statut_commentaire = $statut_commentaire;
    }

    public function setNote($note_commentaire){
        $this->note_commentaire = $note_commentaire;
    }

    public function setAuteur($auteur_chocoblast){
        $this->auteur_chocoblast = $auteur_chocoblast;
    }

    public function setChocoblast($chocoblast_commentaire){
        $this->chocoblast_commentaire = $chocoblast_commentaire;
    }
  
}

?>