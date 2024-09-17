<?php

declare(strict_types=1);

function view_about(): void
{
    include('header.php');
?>
    <!DOCTYPE html>
    <html lang="fr-FR" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Audiora - À propos</title>

        <link rel="stylesheet" href="src/about/style.css">
    </head>

    <body>
        <main>
            <section class="about-section">
                <h2>A propos de nous</h2>
                <h3>Audiora 🎵</h3>
                <p>
                    <strong>Audiora</strong> est une plateforme développée par @MathieuAudibert & @ismaa2k 
                    lors d'un projet de validation de renforcement PHP. 
                </p>
                <p>
                    Nous avons utilisé les technologies suivantes pour le projet :
                </p>
                <ul class="tech-list">
                    <li>PHP</li>
                    <li>HTML/CSS</li>
                    <li>Cloud Firestore</li>
                    <li>JS</li>
                    <li>Trello</li>
                    <li>Vscode</li>
                </ul>

                <p>
                    Les principales fonctionnalités de la plateforme incluent :
                </p>
                <ul class="features-list">
                    <li>Connexion/Inscription</li>
                    <li>Recherche de musique</li>
                    <li>Écoute de musique / Télécharger le mp3</li>
                    <li>Like de musique / Playlist des musiques likées</li>
                    <li>Accès à tous les artistes disponibles</li>
                </ul>

                <p>
                    Le code source du projet est disponible sur notre
                    <a href="https://github.com/MathieuAudibert/PHP-Renforcement" target="_blank">Github</a>.
                </p>

                <h3>Contact</h3>
                <p class="contact-info">
                    mathieu.audibert@efrei.net | ismael.genet@efrei.net
                </p>
            </section>
        </main>
    </body>

    </html>
<?php
}
?>
