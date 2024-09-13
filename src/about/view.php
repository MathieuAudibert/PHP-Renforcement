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
        <title>Audiora</title>
    </head>

    <body>
        <header>
        </header>

        <main>
            <style>
                <?php include 'src\about\style.css'; ?>
            </style>
            <h2>A propos de nous</h2>
            <h3>Audiora 🎵</h3>
            <p><strong>Audiora</strong> est une plateforme développée par @MathieuAudibert & @ismaa2k de <em>streaming musical</em> lors d'un projet de validation de renforcement PHP.</p>
            <p>Nous devions utiliser ces technologies :</a></p>
            <ul>
                <li>PHP</li>
                <li>HTML/CSS</li>
                <li>Cloud Firestore</li>
                <li>JS</li>
            </ul>

            
        </main>

    </body>


    </html>
<?php
};
?>