<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/asset/style/main.css">
    <script src="./public/asset/script/script.js" defer></script>
    <title>Inscription</title>
</head>
<body>
    <div class="formulaire">
        <h1>Connexion</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label class="label" for="nom_utilisateur">Nom :</label>
            <input class="input" type="text" name="nom_utilisateur" id="nom_utilisateur"><br>

            <label class="label" for="prenom_utilisateur">Prénom :</label>
            <input class="input" type="password" name="password_utilisateur" id="prenom_utilisateur"><br>

            <input class="envoyer" type="submit" value="Ajouter" name="submit">
        </form>

        <?php echo $message ?>

    </div>
</body>
</html>