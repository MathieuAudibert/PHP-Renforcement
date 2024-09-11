<?php

function view_homepage(array $musiqueList): void
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
                    <li><a href="/login" id="connexion">Connexion</a></li>
                </span>
            </ul>
            <hr>
        </header>
        <h1>Liste des Musiques</h1>
        <ul>
            <?php if (!empty($musiqueList)): ?>
                <?php foreach ($musiqueList as $musique): ?>
                    <li>
                        <strong>Titre:</strong> <?= htmlspecialchars($musique->getTitre()) ?><br>
                        <strong>Artiste:</strong> <?= htmlspecialchars($musique->getArtiste()) ?><br>
                        <strong>Album:</strong> <?= htmlspecialchars($musique->getAlbum()) ?><br>
                        <strong>Durée:</strong> <?= htmlspecialchars($musique->getDuree()) ?> minutes<br>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Aucune musique disponible.</li>
            <?php endif; ?>
        </ul>
    </body>
    </html>
    <?php
}
