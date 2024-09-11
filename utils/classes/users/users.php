<?php

declare(strict_types=1);

class User {
    protected string $username;
    protected string $email;
    protected string $password;
    protected int $niveauacces; /

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

    public function getUsername(): string {
        return $this->username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getNiveauAcces(): int {
        return $this->niveauacces;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setNiveauAcces(int $niveauacces): void {
        $this->niveauacces = $niveauacces;
    }

    public function canListenTo(Musique $musique): bool {
        $musicAccessLevel = $musique->getNiveauAcces();
        $userSubscriptionLevel = $this->getNiveauAcces();
        
        return $userSubscriptionLevel >= $musicAccessLevel;
    }
}

?>
