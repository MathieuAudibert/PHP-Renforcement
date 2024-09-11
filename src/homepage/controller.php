<?php
require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_homepage(): void
{
    $musiqueList = getMusiques(); 
    view_homepage($musiqueList);
}
