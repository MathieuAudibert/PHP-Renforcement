<?php
require_once('./src/register/model.php');
require_once('./src/register/view.php');
function controller_register()
{
    try {
        $model_result = model_register();
        view_register();
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}
