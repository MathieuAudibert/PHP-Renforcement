<?php
declare(strict_types=1);

abstract class Formulaire {
    abstract public function creerChamp(): Champ;

    public function afficherFormulaire(): string{
        $champ = $this->creerChamp();
        return "Formulaire avec : " . $champ->afficher();
    }
}

class FormulaireTexte extends Formulaire {
    public function creerChamp(): Champ {
        return new ChampTexte();
    }
}

class FormulaireMotDePasse extends Formulaire {
    public function creerChamp(): Champ {
        return new ChampMotDePasse();
    }
}

interface Champ {
    public function afficher(): string;
}

class ChampTexte implements Champ {
    public function afficher(): string {
        return "Champ de texte";
    }
}

class ChampMotDePasse implements Champ {
    public function afficher(): string {
        return "Champ de mot de passe";
    }
}

$formulaire = new FormulaireTexte();
echo $formulaire->afficherFormulaire(); 