<?php

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
        <link rel="stylesheet" href="src/homepage/style.css">
    </head>

    <body>
        <header>
            <main>
                <style>
                    <?php include 'src/homepage/style.css'; ?>
                </style>
                <h2>Liste des Musiques</h2>
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
                                    <button type="button" class="like-button" data-id="<?php echo htmlspecialchars($musique->getId()); ?>">
                                        <img src="https://i.ibb.co/nnL137v/empty-heart.png" alt="heart" class="heart-icon" />
                                    </button>
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

        </header>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.like-button');

                console.log(buttons); // Vérifie si les boutons sont bien sélectionnés

                buttons.forEach(button => {
                    if (button) {
                        button.addEventListener('click', function() {
                            console.log('Bouton cliqué');
                            const musicId = this.getAttribute('data-id');
                            const img = this.querySelector('.heart-icon');
                            const isLiked = img.getAttribute('src') === 'https://i.ibb.co/nnL137v/empty-heart.png';

                            if (isLiked) {
                                img.setAttribute('src', 'https://i.ibb.co/YBnndfP/full-heart.png'); // Lien de l'image pleine
                                fetch('/src/likes/like_music.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            id: musicId
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Musique likée:', data);
                                    })
                                    .catch(error => {
                                        console.error('Erreur:', error);
                                    });
                            }
                        });
                    } else {
                        console.error('Bouton introuvable');
                    }
                });
            });
        </script>

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