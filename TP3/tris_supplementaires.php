<?php
declare(strict_types=1);

echo "sort() — trie les valeurs et réindexe les clés\n";
$notes = [14, 8, 19, 11]; sort($notes); print_r($notes);

echo "\nasort() — trie les valeurs tout en conservant les clés\n";
$notesParEtudiant = ['Sara' => 14, 'Youssef' => 8, 'Nadia' => 19, 'Omar' => 11]; asort($notesParEtudiant); print_r($notesParEtudiant);

echo "\nusort() — tri personnalisé des produits par prix décroissant\n";
$produits = [['nom' => 'Clavier', 'prix' => 450], ['nom' => 'Souris', 'prix' => 120], ['nom' => 'Écran', 'prix' => 1800]];
usort($produits, fn(array $a, array $b): int => $b['prix'] <=> $a['prix']); print_r($produits);

echo "\nuksort() — tri personnalisé des clés, sans tenir compte de la casse\n";
$villes = ['rabat' => 1, 'Agadir' => 2, 'casablanca' => 3, 'Fes' => 4];
uksort($villes, fn(string $a, string $b): int => strcasecmp($a, $b)); print_r($villes);
