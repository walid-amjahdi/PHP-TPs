<?php
class Utilisateur
{
    private array $donnees = [];

    public function __set(string $nom, mixed $valeur): void
    {
        echo "Assignation de '$valeur' à la propriété '$nom'\n";
        $this->donnees[$nom] = $valeur;
    }

    public function __get(string $nom): mixed
    {
        echo "Lecture de la propriété '$nom'\n";
        return $this->donnees[$nom] ?? null;
    }
}

$user = new Utilisateur();
$user->prenom = "Alice";
echo $user->prenom . PHP_EOL;
