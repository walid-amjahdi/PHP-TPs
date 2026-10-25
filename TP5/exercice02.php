<?php
class Utilisateur
{
    public string $nom;
    private int $age;

    public function __construct(string $nom, int $age)
    {
        $this->nom = $nom;
        $this->age = $age;
    }
}

$user = new Utilisateur("Alice", 30);
echo $user->nom . PHP_EOL;
