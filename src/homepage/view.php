<?php

function view_homepage(array $musiqueList, string $genre): void
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Musiques</title>
    </head>
    <body>
        <h1>Musique du genre: <?= htmlspecialchars($genre) ?></h1>
        <ul>
            <?php if (!empty($musiqueList)): ?>
                <?php foreach ($musiqueList as $musique): ?>
                    <li>
                        <strong>Titre:</strong> <?= htmlspecialchars($musique->getTitre()) ?><br>
                        <strong>Artiste:</strong> <?= htmlspecialchars($musique->getArtiste()) ?><br>
                        <strong>Album:</strong> <?= htmlspecialchars($musique->getAlbum()) ?><br>
                        <strong>Durée:</strong> <?= htmlspecialchars($musique->getDuree()) ?> minutes<br>
                        <strong>Genre:</strong> <?= htmlspecialchars($musique->getGenre()) ?><br>
                        <strong>Niveau d'accès:</strong> <?= htmlspecialchars($musique->getNiveauAcces()) ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Aucune musique disponible pour ce genre.</li>
            <?php endif; ?>
        </ul>
    </body>
    </html>
    <?php
}
