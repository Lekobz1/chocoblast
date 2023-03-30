<!-- partie affichage HTML -->
<!-- //http://localhost/chocoblast/App/vue/view_add_user.php// chemin d'acces affichage -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/asset/style/main.css">
    <script src="../../Public/asset/script/script.js" defer></script>
    <title>Inscription</title>
</head>
<body>
    <div class="formulaire">
        <h1>Ajouter un utilisateur</h1>
        <form method="POST" action="../controler/ControlerAddUser.php" enctype="multipart/form-data">
            <label class="label" for="nom_utilisateur">Nom :</label>
            <input class="input" type="text" name="nom_utilisateur" id="nom_utilisateur"><br>

            <label class="label" for="prenom_utilisateur">Prénom :</label>
            <input class="input" type="text" name="prenom_utilisateur" id="prenom_utilisateur"><br>

            <label class="label" for="mail_utilisateur">E-mail :</label>
            <input class="input" type="email" name="mail_utilisateur" id="mail_utilisateur"><br>

            <label class="label" for="password_utilisateur">Mot de passe :</label>
            <input class="input" type="password" name="password_utilisateur" id="password_utilisateur"><br>

            <label class="label" for="image_utilisateur">Image :</label>
            <input class="input" type="file" name="image_utilisateur" id="image_utilisateur"><br>

            <input class="envoyer" type="submit" value="Ajouter" name="submit">
        </form>

    </div>
</body>
</html>