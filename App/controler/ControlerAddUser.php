<?php
    //connecter la bdd
    include '../utils/BddConnect.php';
    include '../manager/ManagerUtilisateur.php';



    if (isset($_POST['submit'])){
        if (!empty($_POST['nom_utilisateur']) and !empty($_POST['prenom_utilisateur']) and !empty($_POST['mail_utilisateur']) and !empty($_POST['password_utilisateur']) ){
            //test si le fichier à été importé (dossier tmp)
                if($_FILES['image_utilisateur']['tmp_name'] !=""){
                    //tester la taille du fichier
                    if($_FILES['image_utilisateur']['size'] <(1000*1024)){
                        //récupération de l'extension du fichier
                        $ext =  get_file_extension($_FILES['image_utilisateur']['name']);
                        //test de l'extension du fichier
                        if($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png'){
                            //stocker contenu formulaire
                            $image = $_FILES['image_utilisateur']['name'];
                            //stocker contenu formulaire
                            $destination = '../public/asset/image/';
                            $nom = $_POST['nom_utilisateur'];
                            $prenom = $_POST['prenom_utilisateur'];
                            $mail = $_POST['mail_utilisateur'];
                            $motdepasse = password_hash($_POST['password_utilisateur'], PASSWORD_DEFAULT);

                            //déplacer le fichier
                            move_uploaded_file($_FILES['image_utilisateur']['tmp_name'],$destination.$nom);
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
                    $image = '../public/asset/image/prestations.jpg';
                    //stocker contenu formulaire
                    $nom = $_POST['nom_utilisateur'];
                    $prenom = $_POST['prenom_utilisateur'];
                    $mail = $_POST['mail_utilisateur'];
                    $motdepasse = password_hash($_POST['password_utilisateur'], PASSWORD_DEFAULT);
                    //ajouter en BDD
                    $bdd= BddConnect::connexion();
                    ajouter_nouveau_compte($bdd, $nom, $prenom, $mail, $motdepasse, $image);
                    //afficher une confirmation d'ajout
                    echo "l'utilisateur a ete ajouté";
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
            $bdd = BddConnect::connexion();
            // preparation de la requete + ajout de le 'ID pour le role et on lui affecte la valeur 1 pour forcer que ce soit un user
            $requete = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur,id_roles) VALUES (?,?,?,?,?,1)');
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

    //fonction qui recherche si un utilisateur existe par son nom et prenom
    function getUserByName($bdd, $mail){
        try {
            $email = $mail;

            $requete= $bdd->prepare('SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur=?');

            $requete->bindParam(1, $email, PDO::PARAM_STR);

            $requete->execute();

            $existe = $requete->fetchAll(PDO::FETCH_ASSOC);

            return $existe;

        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        }
    }

?>