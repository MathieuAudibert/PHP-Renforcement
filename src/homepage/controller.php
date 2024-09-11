<?php
require_once __DIR__ . '\model.php';
require_once __DIR__ . '\view.php';

function controller_homepage(string $genre): void
{
    $musiqueList = getMusiqueByGenre($genre);
    view_homepage($musiqueList, $genre);
}