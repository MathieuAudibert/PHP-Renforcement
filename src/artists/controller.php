<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_artists(): void
{
    $user = model_artists();
    view_artists($user);
}
