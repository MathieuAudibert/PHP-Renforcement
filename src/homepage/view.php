<?php

function view_homepage(array $musiqueList): void
{
    ?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <link rel="stylesheet" href="../style.css"> 
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
        
        <main>
            <h1>Liste des Musiques</h1>
            <div class="musique-list">
                <?php if (!empty($musiqueList)): ?>
                    <ul>
                        <?php foreach ($musiqueList as $musique): ?>
                            <li>
                                <h3><?php echo htmlspecialchars($musique->getTitre()); ?></h3>
                                <p>Artiste : <?php echo htmlspecialchars($musique->getArtiste()); ?></p>
                                <p>Album : <?php echo htmlspecialchars($musique->getAlbum()); ?></p>
                                <p>Durée : <?php echo htmlspecialchars($musique->getDuree()); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Aucune musique n'a été trouvée.</p>
                <?php endif; ?>
            </div>
        </main>
    </body>
    </html>
    <?php
}
?>
