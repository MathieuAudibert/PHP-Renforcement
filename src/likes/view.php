<?php

declare(strict_types=1);

function view_likes(array $likedMusics): void
{
    include 'header.php';
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Audiora</title>
        <link rel="stylesheet" href="src/likes/style.css">
    </head>

    <body>
        <header></header>

        <main>
            <h2>Titres likés</h2>
            <ul class="liked-music-list">
                <?php if (!empty($likedMusics)): ?>
                    <?php foreach ($likedMusics as $musique): ?>
                        <li class="musique-card">
                            <h3>Artiste : <?php echo htmlspecialchars($musique->getArtiste()); ?></h3>
                            <p>Titre : <?php echo htmlspecialchars($musique->getTitre()); ?></p>
                            <p>Album : <?php echo htmlspecialchars($musique->getAlbum()); ?></p>
                            <img src="<?php echo htmlspecialchars($musique->getCover()); ?>" alt="Cover de la musique">
                            <br>
                            <audio controls>
                                <source src="<?php echo htmlspecialchars($musique->getAudioSrc()); ?>" type="audio/mpeg">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucune musique likée.</p>
                <?php endif; ?>
            </ul>
        </main>
    </body>

    </html>
<?php
}
?>
