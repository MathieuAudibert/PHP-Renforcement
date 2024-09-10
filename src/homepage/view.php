<?php
function view_homepage()
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

        <main>
            <style>
                <?php include './src/style.css'; ?>
            </style>
            <p>OUI</p>
            <?php
            class HomePageView {
                public static function render(array $musiques): void {
                    echo "<h1>Liste des musiques</h1>";
                    echo "<ul>";
                    foreach ($musiques as $musique) {
                        echo "<li>" . htmlspecialchars($musique->getTitre()) . " par " . htmlspecialchars($musique->getArtiste()) . " - Genre : " . htmlspecialchars($musique->getGenre()) . "</li>";
                    }
                echo "</ul>";
                }
            }
            ?>
        </main>

    </body>

    </html>
<?php
}
?>