<?php

declare(strict_types=1);

interface AbonnementStrategy {
    public function getAccessDescription(): string;
}

class BasicAbonnementStrategy implements AbonnementStrategy {
    public function getAccessDescription(): string {
        return "Niveau basique";
    }
}

class PremiumAbonnementStrategy implements AbonnementStrategy {
    public function getAccessDescription(): string {
        return "Niveau intermediaire";
    }
}

class VipAbonnementStrategy implements AbonnementStrategy {
    public function getAccessDescription(): string {
        return "Niveau Prenium.";
    }
}

?>
