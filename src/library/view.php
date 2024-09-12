<?php

declare(strict_types=1);

function view_library(): void
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
                <?php include 'src\library\style.css'; ?>
            </style>
            <h2>Bibliothèque</h2>
        </main>

    </body>

    </html>
<?php
};
?>