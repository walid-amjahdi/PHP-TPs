<?php
class Utilisateur
{
    public function __construct(public string $nom, private int $age)
    {
    }
}

$user = new Utilisateur("Alice", 30);
echo $user->nom . PHP_EOL;
