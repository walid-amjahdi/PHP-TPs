<?php
class UtilisateurClassique
{
    private string $nom;
    private string $email;

    public function setNom(string $nom): void { $this->nom = $nom; }
    public function getNom(): string { return $this->nom; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getEmail(): string { return $this->email; }
}

$user = new UtilisateurClassique();
$user->setNom("Alice");
$user->setEmail("alice@example.com");
echo "Nom : " . $user->getNom() . PHP_EOL;
echo "Email : " . $user->getEmail() . PHP_EOL;
