<?php

declare(strict_types=1);
function view_register(): void
{
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Audiora</title>
    </head>

    <body>
        <header>
            <ul class="UlHeader">
                <span class="LeftNavNoConnect">
                    <li><a href="/"><img id="Logo" src="https://static.vecteezy.com/system/resources/previews/013/442/219/original/blank-cd-or-dvd-disc-png.png"></a></li>
                    <li><a href="#">Bibliothèque</a></li>
                    <li><a href="#">Playlist</a></li>
                    <li><a href="#">Artistes</a></li>
                    <li><a href="#">À propos</a></li>
                </span>
                <span class="RightNavNoConnect">
                    <li><a href="/login" id="connexion">Connexion</a></li>
                </span>
            </ul>
            <hr>
        </header>

        <main>
            <style>
                <?php include 'src\register\style.css'; ?>
            </style>
            <div class="middle_container">
                <h1>Inscription</h1>
                <br>
                <form onsubmit="alert('Inscription réussi !');" action="" method="POST">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" required>

                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" required>

                    <label for="email">Email :</label>
                    <input type="text" name="email" id="email" required>

                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>

                    <button type="submit" name="submit" value="Se connecter">Se connecter</button>
                    <br>
                    <a href="/login">Vous avez déjà un compte chez nous ? Connectez-vous !</a>

                </form>
            </div>
        </main>

    </body>

    </html>
<?php
};
?>