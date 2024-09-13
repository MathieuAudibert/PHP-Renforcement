<?php

declare(strict_types=1);

function view_homepage(array $musiqueList): void
{
    include('header.php');
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Audiora</title>
    </head>

    <body>
        <header>
        </header>

        <main>
            <style>
                <?php include 'src\homepage\style.css'; ?>
            </style>
            <h2>Liste des Musiques</h2>
            <ul class="musique-list">
                <?php if (!empty($musiqueList)): ?>
                    <?php foreach ($musiqueList as $index => $musique): ?>
                        <li class="musique-card">
                            <h3>Artiste : <?php echo htmlspecialchars($musique->getArtiste()); ?></h3>
                            <p>Titre : <?php echo htmlspecialchars($musique->getTitre()); ?></p>
                            <p>Album : <?php echo htmlspecialchars($musique->getAlbum()); ?></p>
                            <p>Durée : <?php echo htmlspecialchars($musique->getDuree()); ?></p>
                            <img src="<?php echo htmlspecialchars($musique->getCover()); ?>" alt="Cover de la musique">
                            <br>
                            <figure>
                                <figcaption></figcaption>
                                <?php if (!empty($musique->getAudioSrc())): ?>
                                    <audio controls>
                                        <source src="<?php echo htmlspecialchars($musique->getAudioSrc()); ?>" type="audio/mpeg">
                                        Votre navigateur ne supporte pas l'élément audio.
                                    </audio>
                                <?php else: ?>
                                    <p>Fichier audio non disponible.</p>
                                <?php endif; ?>
                            </figure>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucune musique n'a été trouvée.</p>
                <?php endif; ?>
            </ul>
    </body>

    </html>
<?php
};
?>
