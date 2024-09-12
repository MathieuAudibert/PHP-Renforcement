<?php

declare(strict_types=1);

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/view.php';

function controller_library(): void
{
    $user = model_library();
    view_library($user);
}
