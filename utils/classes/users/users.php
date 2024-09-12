<?php
declare(strict_types=1);

class User {
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $password;
    protected array $titresLike;

    public function __construct(
        string $nom,
        string $prenom,
        string $email,
        string $password,
        array $titresLike
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT); 
        $this->titresLike = $titresLike;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getTitresLike(): array {
        return $this->titresLike;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void{
        $this->prenom = $prenom;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setTitreLike(array $titresLike): void {
        $this->titresLike = $titresLike;
    }   
}

?>
