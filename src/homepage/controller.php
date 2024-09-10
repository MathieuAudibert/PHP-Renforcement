<?php
require_once __DIR__ . '\model.php';
require_once __DIR__ . '\view.php';

function controller_homepage()
{
    try {
        $model_result = model_homepage();
        view_homepage();
    } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
}

class HomePageController {
    private MusiqueModel $musiqueModel;

    public function __construct() {
        $this->musiqueModel = new MusiqueModel();
    }

    public function displayHomePage(): void {
        $musiques = $this->musiqueModel->getAllMusiques();
        HomePageView::render($musiques);
    }
}

$controller = new HomePageController();
$controller->displayHomePage();