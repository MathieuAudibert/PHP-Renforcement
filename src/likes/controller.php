<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_likes(): void
{
    $user = model_likes();
    view_likes($user);
}
