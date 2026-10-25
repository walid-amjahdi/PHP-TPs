<?php
class UtilisateurMagique
{
    private array $data = [];

    public function __set(string $name, mixed $value): void
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name): mixed
    {
        return $this->data[$name] ?? null;
    }
}

$user = new UtilisateurMagique();
$user->nom = "Alice";
$user->email = "alice@example.com";
echo "Nom : " . $user->nom . PHP_EOL;
echo "Email : " . $user->email . PHP_EOL;
