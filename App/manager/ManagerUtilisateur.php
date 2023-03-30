<?php
require_once '../utils/BddConnect.php';
require_once '../model/Utilisateur.php';

class ManagerUtilisateur extends Utilisateur{

    public function getUserByMail(){
        try {
            $mail = $this->getMail();
            $bdd = BddConnect::connexion();
            $req = $bdd->prepare('SELECT mail_utilisateur, nom_utilisateur, prenom_utilisateur, password_utilisateur FROM utilisateur WHERE mail_utilisateur=?');

            $req->bindParam(1, $mail, PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;

        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

    public function insertUser(){

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

    public function activeUser(){

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