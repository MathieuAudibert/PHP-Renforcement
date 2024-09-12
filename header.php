<?php
session_start();

function select_role()
{
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        header_connected($user['nom'], $user['prenom']);
    } else {
        header_noConnect();
    }
}


function header_connected($nom, $prenom)
{
    echo '
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Musiques</title>
    </head>

    <body>
        <header>
            <ul class="UlHeader">
                <span class="LeftNavConnected">
                    <li><a href="/"><img id="Logo" src="https://static.vecteezy.com/system/resources/previews/013/442/219/original/blank-cd-or-dvd-disc-png.png"></a></li>
                    <li><a href="#">Bibliothèque</a></li>
                    <li><a href="#">Titres Likés</a></li>
                    <li><a href="#">Artistes</a></li>
                    <li><a href="#">À propos</a></li>
                </span>
                <span class=RightNavNoConnect> 
                        <li>' . htmlspecialchars($prenom) . '</li>
                        <li> <a href=/logout ><img id=Theme src=https://i.ibb.co/S77z1XY/icons8-logout-48.png> </a></li>
                    </span>
            </ul>
            <hr>
        </header>
    </body>
    </html>
    ';
}

function header_noConnect()
{
    echo '
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Musiques</title>
    </head>

    <body>
        <header>
            <ul class="UlHeader">
                <span class="LeftNavNoConnect">
                    <li><a href="/"><img id="Logo" src="https://static.vecteezy.com/system/resources/previews/013/442/219/original/blank-cd-or-dvd-disc-png.png"></a></li>
                    <li><a href="#">Bibliothèque</a></li>
                    <li><a href="#">Titres Likés</a></li>
                    <li><a href="#">Artistes</a></li>
                    <li><a href="#">À propos</a></li>
                </span>
                <span class="RightNavNoConnect">
                    <li><a href="/register" id="inscription">Inscription</a></li>
                    <li><a href="/login" id="connexion">Connexion</a></li>
                </span>
            </ul>
            <hr>
        </header>
         <script>
                var currentPath = window.location.pathname;
                var pathsToRedirect = [
                    "/bibliotheque",
                    "/likes",
                    "/artistes",
                    "/about",
                ];
                
                if (pathsToRedirect.includes(currentPath)) {
                    window.location.href = "/login";
                }
            </script>
    </body>
    </html>
    ';
}

select_role();
