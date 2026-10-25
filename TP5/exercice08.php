<?php
class Utilisateur implements Stringable
{
    public function __construct(private string $nom)
    {
    }

    public function __toString(): string
    {
        return "Utilisateur: " . $this->nom;
    }
}

$user = new Utilisateur("Alice");
echo $user . PHP_EOL;
