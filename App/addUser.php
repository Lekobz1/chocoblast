<?php
    //connecter la bdd
    include '../App/utils/connectbdd/connectBdd.php';

    if (isset($_POST['submit'])){
        if (!empty($_POST['nom_utilisateur']) and !empty($_POST['prenom_utilisateur']) and !empty($_POST['mail_utilisateur']) and !empty($_POST['password_utilisateur']) and !empty($_POST['image_utilisateur'])){
            //test si le fichier à été importé (dossier tmp)
            if($_FILES['image_utilisateur']['tmp_name'] !=""){
                //tester la taille du fichier
                if($_FILES['image']['size'] <(10000*1024)){
                    //récupération de l'extension du fichier
                    $ext =  get_file_extension($_FILES['image_utilisateur']['name']);
                    //test de l'extension du fichier
                    if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png'){
                        //stocker contenu formulaire
                        $destination = '../public/asset/image/';
                        $nom = $_POST['nom_utilisateur'];
                        $prenom = $_POST['prenom_utilisateur'];
                        $mail = $_POST['mail_utilisateur'];
                        $motdepasse = $_POST['password_utilisateur'];
                        $image = $_POST['image_utilisateur'];
                        //déplacer le fichier
                        move_uploaded_file($_FILES['image_utilisateur']['tmp_name'],$destination.$name.'.'.$ext);
                        echo 'le fichier à été importé';
                        //ajouter en BDD
                        ajouter_nouveau_compte($bdd, $nom, $prenom, $mail, $motdepasse, $image);
                        //afficher une confirmation d'ajout
                        echo "l'utilisateur a ete ajouté";
                    }else{
                        echo "le fichier n'a pas la bonne extention";
                    }
                }else{
                    echo "le fichier est trop volumineux";
                }
            }else{
                Echo "le fichier n'a pas été importé";
            }
            
        }else{
            echo "merci de remplir les données demandées";
        }
    }else{
        echo "merci de remplir le formulaire";
    }



    //fonction pour récupérer l'extension
    function get_file_extension($file) {
        return substr(strrchr($file,'.'),1);
    }

    //fonction pour ajouter un nouveau compte
    function ajouter_nouveau_compte($bdd, $nom, $prenom, $mail, $motdepasse, $image){
       //on exec le code SQL
        try {
            //on recupere des parametres
            $surname = $nom;
            $name = $prenom;
            $email = $mail;
            $password = $motdepasse;
            $file = $image;
            // preparation de la requete
            $requete = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur) VALUES (?,?,?,?,?)');
            //affectation des variables
            $requete->bindParam(1, $surname, PDO::PARAM_STR);
            $requete->bindParam(2, $name, PDO::PARAM_STR);
            $requete->bindParam(3, $email, PDO::PARAM_STR);
            $requete->bindParam(4, $password, PDO::PARAM_STR);
            $requete->bindParam(5, $file, PDO::PARAM_STR);
            //exécution de la requête
            $requete->execute();
        //gestion des erreurs (Exeception)
        } catch (Exception $e){
            die('Error: '.$e->getMessage());
        }
    }

?>