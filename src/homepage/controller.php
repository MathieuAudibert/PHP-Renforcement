<?php
require_once __DIR__ . '\model.php';
require_once __DIR__ . '\view.php';

class MusiqueController
{
    private MusiqueModel $musiqueModel;

    public function __construct()
    {
        $this->musiqueModel = new MusiqueModel();
    }

    public function afficherMusiqueParGenre(string $genre): void
    {
        $musiqueList = $this->musiqueModel->getMusiqueByGenre($genre);
    }
}