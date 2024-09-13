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
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <main>
                <h2>Liste des Musiques</h2>
                <style>
                    <?php include 'src/homepage/style.css'; ?>
                </style>
                <ul class="musique-list" id="musiqueList">
                    <?php if (!empty($musiqueList)): ?>
                        <?php foreach ($musiqueList as $musique): ?>
                            <li class="musique-card">
                                <h3>Artiste : <?php echo htmlspecialchars($musique->getArtiste()); ?></h3>
                                <p>Titre : <?php echo htmlspecialchars($musique->getTitre()); ?></p>
                                <p>Album : <?php echo htmlspecialchars($musique->getAlbum()); ?></p>
                                <img src="<?php echo htmlspecialchars($musique->getCover()); ?>" alt="Cover de la musique">
                                <br>
                                <?php if (!empty($musique->getAudioSrc())): ?>
                                    <audio controls>
                                        <source src="<?php echo htmlspecialchars($musique->getAudioSrc()); ?>" type="audio/mpeg">
                                        Votre navigateur ne supporte pas l'élément audio.
                                    </audio>
                                <?php else: ?>
                                    <p>Fichier audio non disponible.</p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucune musique n'a été trouvée.</p>
                    <?php endif; ?>
                </ul>
            </main>

            <script>
                document.getElementById('search').addEventListener('input', function() {
                    const searchTerm = this.value;
                    console.log('Search Term:', searchTerm);

                    fetch('search.php?search=' + encodeURIComponent(searchTerm))
                        .then(response => response.text())
                        .then(text => {
                            console.log('Server Raw Response:', text);
                            const musiqueList = document.getElementById('musiqueList');
                            if (!musiqueList) {
                                console.error('Element #musiqueList not found');
                                return;
                            }

                            musiqueList.innerHTML = '';

                            if (text) {
                                try {
                                    const data = JSON.parse(text);
                                    console.log('Parsed Data:', data);
                                    if (Array.isArray(data) && data.length > 0) {
                                        data.forEach(musique => {
                                            const li = document.createElement('li');
                                            li.classList.add('musique-card');
                                            li.innerHTML = `
                                                <h3>Artiste : ${musique.artiste}</h3>
                                                <p>Titre : ${musique.titre}</p>
                                                <p>Album : ${musique.album}</p>
                                                <p>Durée : ${musique.duree}</p>
                                                <img src="${musique.cover}" alt="Cover de la musique">
                                                <br>
                                                <audio controls>
                                                    <source src="${musique.audioSrc}" type="audio/mpeg">
                                                    Votre navigateur ne supporte pas l'élément audio.
                                                </audio>
                                            `;
                                            musiqueList.appendChild(li);
                                        });
                                    } else {
                                        console.log('No music found.');
                                        musiqueList.innerHTML = '<p>Aucune musique trouvée.</p>';
                                    }
                                } catch (error) {
                                    console.error('JSON Parsing Error:', error);
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                        });
                });
            </script>
        </header>
    </body>

    </html>
<?php
};
?>
