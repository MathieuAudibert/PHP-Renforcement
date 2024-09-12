<?php
function view_login()
{
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
            <ul class="UlHeader">
                <span class="LeftNavNoConnect">
                    <li><a href="/"><img id="Logo" src="https://static.vecteezy.com/system/resources/previews/013/442/219/original/blank-cd-or-dvd-disc-png.png"></a></li>
                    <li><a href="#">Bibliothèque</a></li>
                    <li><a href="#">Playlist</a></li>
                    <li><a href="#">Artistes</a></li>
                    <li><a href="#">À propos</a></li>
                </span>
                <span class="RightNavNoConnect">
                    <li><a href="/register" id="inscription">Inscription</a></li>
                </span>
            </ul>
            <hr>
        </header>

        <main>
            <style>
                <?php include 'src\login\style.css'; ?>
            </style>
            <div class="middle_container">
                <h1>Connexion</h1>
                <br>
                <form action="" method="POST">
                    <label for="email">Email :</label>
                    <input type="text" name="email" id="email" required>

                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>

                    <button type="submit" name="submit" value="Se connecter">Se connecter</button>
                    <br>
                    <a href="/register">Cliquez ici si vous n'avez pas de compte Audiora</a>
                </form>
            </div>
        </main>

    </body>

    </html>
<?php
}
?>