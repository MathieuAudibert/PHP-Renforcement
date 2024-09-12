<?php

require_once('./src/login/model.php');
require_once('./src/login/view.php');
function controller_login()
{
    try {
        $model_result = model_login();
        view_login();
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}
