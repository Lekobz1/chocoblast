<?php
    //connecter la bdd
    include './App/utils/BddConnect.php';
    include './App/model/Utilisateur.php';
    include './App/manager/ManagerUtilisateur.php';
    

    $message = '';

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
                            // $image = $_FILES['image_utilisateur']['name'];
                            //stocker contenu formulaire
                            $destinationImg = '../public/asset/image/'.$_FILES['image_utilisateur']['name'];
                            $nom = $_POST['nom_utilisateur'];
                            $prenom = $_POST['prenom_utilisateur'];
                            $mail = $_POST['mail_utilisateur'];
                            $motdepasse = password_hash($_POST['password_utilisateur'], PASSWORD_DEFAULT);

                            //déplacer le fichier
                            move_uploaded_file($_FILES['image_utilisateur']['tmp_name'],$destination.$nom);
                            //ajouter en BDD
                            $nouveauUtilisateur = new ManagerUtilisateur($nom, $prenom, $mail, $motdepasse);
                            $nouveauUtilisateur->setImage($destinationImg);
                            $nouveauUtilisateur->insertUser();
                            // ajouter_nouveau_compte($bdd, $nom, $prenom, $mail, $motdepasse, $image);
                            //afficher une confirmation d'ajout
                            $message =  "l'utilisateur a ete ajouté"; 
                        }else{
                            $message = "le fichier n'a pas la bonne extention";
                        }
                    }else{
                        $message = "le fichier est trop volumineux";
                    }
                }else{
                    $destinationImg = '../public/asset/image/prestations.jpg';
                    //stocker contenu formulaire
                    $nom = $_POST['nom_utilisateur'];
                    $prenom = $_POST['prenom_utilisateur'];
                    $mail = $_POST['mail_utilisateur'];
                    $motdepasse = password_hash($_POST['password_utilisateur'], PASSWORD_DEFAULT);
                    //ajouter en BDD
                    $bdd= BddConnect::connexion();
                    $nouveauUtilisateur = new ManagerUtilisateur($nom, $prenom, $mail, $motdepasse);
                    $nouveauUtilisateur->setImage($destinationImg);
                    $nouveauUtilisateur->insertUser();
                    // ajouter_nouveau_compte($bdd, $nom, $prenom, $mail, $motdepasse, $image);
                    //afficher une confirmation d'ajout
                    $message = "l'utilisateur a ete ajouté";
                }     
        }else{
            $message = "merci de remplir les données demandées";
        }
    }else{
        $message = "merci de remplir le formulaire";
    }

    //fonction pour récupérer l'extension
    function get_file_extension($file) {
        return substr(strrchr($file,'.'),1);
    }

    include './App/vue/view_add_user.php';
?>