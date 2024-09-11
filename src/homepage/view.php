<?php

function view_homepage(array $musiqueList): void
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Musiques</title>
    </head>
    <body>
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
