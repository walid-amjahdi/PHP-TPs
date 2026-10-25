<?php
class Panier implements Countable
{
    private array $articles = ['Pomme', 'Poire', 'Banane'];

    public function count(): int
    {
        return count($this->articles);
    }
}

$monPanier = new Panier();
echo count($monPanier) . PHP_EOL;
