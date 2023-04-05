<?php 
$bdd = BddConnect::connexion();
$message = "";

//tester si c'est submit
if (isset($_POST['submit'])){
    //verifier si le mail et le password sont rempli
    if (!empty($_POST['mail_utilisateur']) and !empty($_POST['password_utilisateur'])){

    }


}else {
    $message = "merci de remplir les informations de connexion";
}


include './App/vue/view_sign.php'
?>