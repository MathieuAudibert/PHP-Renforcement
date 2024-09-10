<?php
require_once('./src/homepage/model.php');
require_once('./src/homepage/view.php');

function controller_homepage()
{
    try {
        $model_result = model_homepage();
        view_homepage();
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}

class MusiqueController {

    private $model;

    public function __construct() {
        $this->model = new MusiqueModel();
    }

    public function afficherMusiques() {
        $musiques = $this->model->getAllMusique();
        require __DIR__ . '/view.php'; 
    }
}