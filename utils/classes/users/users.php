<?php

declare(strict_types=1);

require_once __DIR__ . '/strategie.php';

class User {
    public const NIVEAU_ACCES_BASIC = 1;
    public const NIVEAU_ACCES_PREMIUM = 2;
    public const NIVEAU_ACCES_VIP = 3;

    protected string $username;
    protected string $email;
    protected string $password;
    protected int $niveauacces;

    public function __construct(
        string $username,
        string $email,
        string $password,
        int $niveauacces
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT); 
        $this->niveauacces = $niveauacces;
    }

    public function canListenTo(Musique $musique): bool {
        $musicAccessLevel = $musique->getNiveauAcces();
        $userSubscriptionLevel = $this->getNiveauAcces();
        
        return $userSubscriptionLevel >= $musicAccessLevel;
    }

    public function getAccessStrategy(): AbonnementStrategy {
        switch ($this->niveauacces) {
            case self::NIVEAU_ACCES_BASIC:
                return new BasicAbonnementStrategy();
            case self::NIVEAU_ACCES_PREMIUM:
                return new PremiumAbonnementStrategy();
            case self::NIVEAU_ACCES_VIP:
                return new VipAbonnementStrategy();
            default:
                throw new InvalidArgumentException("Niveau d'accès inconnu.");
        }
    }
}

?>
