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
            <!-- Affichage de la liste des musiques -->
            <ul class="musique-list">
                <?php if (!empty($musiqueList)): ?>
                    <?php foreach ($musiqueList as $index => $musique): ?>
                        <li class="musique-card">
                            <h3>Artiste : <?php echo htmlspecialchars($musique->getArtiste()); ?></h3>
                            <p>Titre : <?php echo htmlspecialchars($musique->getTitre()); ?></p>
                            <p>Album : <?php echo htmlspecialchars($musique->getAlbum()); ?></p>
                            <p>Durée : <?php echo $musique->getDuree(); ?></p>
                            <img src="<?php echo $musique->getCover(); ?>" alt="Cover de la musique">
                            <br>

                            <!-- Bouton de lecture avec un ID unique -->
                            <button type="button" id="play-button-<?php echo $index; ?>">
                                <img src="https://i.ibb.co/k9rpCxM/bouton-jouer.png" alt="playbutton" id="button-img-<?php echo $index; ?>" />
                            </button>

                            <button type="button" id="stop-button-<?php echo $index; ?>" style="display: none;">
                                <img src="https://i.ibb.co/bFXX3kF/bouton-de-pause-video.png" alt="stopbutton" />
                            </button>

                            <figure>
                                <figcaption></figcaption>

                                <!-- Suppression de l'attribut controls -->
                                <?php if (!empty($musique->getAudioSrc())): ?>
                                    <audio id="audio-<?php echo $index; ?>">
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

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let currentAudio = null; // Stocke l'audio actuellement en lecture
                    let isSwitchingAudio = false; // Pour empêcher des actions simultanées

                    // Fonction pour jouer ou arrêter l'audio
                    async function toggleAudio(index) {
                        if (isSwitchingAudio) return; // Empêche de déclencher plusieurs actions à la fois
                        isSwitchingAudio = true; // Verrouille l'état pendant le changement

                        const audio = document.getElementById('audio-' + index);
                        const playButton = document.getElementById('play-button-' + index);
                        const stopButton = document.getElementById('stop-button-' + index);

                        if (!audio) {
                            console.error('Audio non trouvé pour cet index.');
                            isSwitchingAudio = false; // Libère le verrou
                            return;
                        }

                        // Si un autre audio est en lecture, on le met en pause après un délai
                        if (currentAudio && currentAudio !== audio) {
                            currentAudio.pause();
                            currentAudio.currentTime = 0;
                            const previousPlayButton = document.getElementById(`play-button-${currentAudio.dataset.index}`);
                            const previousStopButton = document.getElementById(`stop-button-${currentAudio.dataset.index}`);
                            previousPlayButton.style.display = 'inline-block';
                            previousStopButton.style.display = 'none';
                        }

                        // Si l'audio est en pause, on le joue
                        if (audio.paused) {
                            try {
                                await audio.play(); // On attend que l'audio démarre correctement
                                playButton.style.display = 'none';
                                stopButton.style.display = 'inline-block';
                                currentAudio = audio;
                                currentAudio.dataset.index = index;
                            } catch (error) {
                                console.error('Erreur lors de la tentative de lecture de l\'audio :', error);
                            }
                        } else {
                            // Si l'audio est en lecture, on le met en pause
                            audio.pause();
                            playButton.style.display = 'inline-block';
                            stopButton.style.display = 'none';
                            currentAudio = null;
                        }

                        isSwitchingAudio = false; // Libère le verrou après traitement
                    }

                    // Ajout d'événements sur les boutons play et stop
                    <?php foreach ($musiqueList as $index => $musique): ?>
                        document.getElementById('play-button-<?php echo $index; ?>').addEventListener('click', function() {
                            toggleAudio(<?php echo $index; ?>);
                        });

                        document.getElementById('stop-button-<?php echo $index; ?>').addEventListener('click', function() {
                            toggleAudio(<?php echo $index; ?>);
                        });
                    <?php endforeach; ?>

                    // Gestion des erreurs pour les éléments audio
                    const audios = document.querySelectorAll('audio');
                    audios.forEach(audio => {
                        audio.onerror = function() {
                            console.error(`Erreur de lecture audio pour l'élément : ${audio.src}`);
                        };
                    });
                });
            </script>

    </body>

    </html>
<?php
};
?>