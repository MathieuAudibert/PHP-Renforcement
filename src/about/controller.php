<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_about(): void
{
    $user = model_about();
    view_about($user);
}
