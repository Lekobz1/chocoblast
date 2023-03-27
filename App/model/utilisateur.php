<?php

class Utlisateur{

    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $image;
    private $statut = false;
    private $role = 1;


    function __construct($nom, $prenom, $mail, $password){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getId(){
        return $this->id;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getMail(){
        return $this->mail;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getImage(){
        return $this->image;
    }

    public function getStatut(){
        return $this->statut;
    }

    public function getRole(){
        return $this->role;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setStatut($statut){
        $this->statut = $statut;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public function getUserByMail($bdd){
        try {
            $mail = $this->getMail();

            $req = $bdd->prepare('SELECT mail_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur FROM utilisateur WHERE mail_utilisateur=?');

            $req->bindParam(1, $mail, PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;

        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

    public function insertUser($bdd){

        try {
            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $mail = $this->getMail();
            $password = $this->getPassword();
            $image = $this->getImage();
            $statut = $this->getStatut();
            $role = $this->getRole();

            $req = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur,statut_utilisateur,id_role) VALUES (?,?,?,?,?,?,?)');

            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $mail, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);
            $req->bindParam(5, $image, PDO::PARAM_STR);
            $req->bindParam(6, $statut, PDO::PARAM_STR);
            $req->bindParam(7, $role, PDO::PARAM_STR);

            $req->execute();

        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }

    }

    public function activeUser($bdd){

        try {

            $statut = $this->getStatut();

            $req = $bdd->prepare('UPDATE utilisateur SET statut_utilisateur = true WHERE id_utilisateur = ?');

            $req->bindParam(1, $this->getId(), PDO::PARAM_STR);

            $req->execute();

        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }

    }




}

?>