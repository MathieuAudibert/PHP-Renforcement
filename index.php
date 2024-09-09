<?php
$email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
$password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : '';
?>

<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
</head>

<body>

    <header>
        <ul class=UlHeader>
            <span class=LeftNavNoConnect>
                <li><a href=#><img id=Logo src=https://static.vecteezy.com/system/resources/previews/013/442/219/original/blank-cd-or-dvd-disc-png.png></a></li>
                <li><a href=#>Bibliothèque</a></li>
                <li><a href=#>Playlist</a></li>
                <li><a href=#>Artistes</a></li>
                <li><a href=#>À propos</a></li>
            </span>
            <span class=RightNavNoConnect>
                <li> <a href=# id=prenomheader>$nom, $prenom </a>
            </span>
        </ul>
        <hr>
    </header>

    <main>
        <div class="middle_container">
            <h1>Connexion</h1>
            <br>
            <form action="" method="post">
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" value="Se connecter">Se connecter</button>
            </form>
        </div>
    </main>

</body>

</html>