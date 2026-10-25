<?php
class Equipe implements IteratorAggregate
{
    private array $joueurs = ["Léo", "Amine", "Sarah"];

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->joueurs);
    }
}

$equipe = new Equipe();
foreach ($equipe as $joueur) {
    echo $joueur . " ";
}
echo PHP_EOL;
