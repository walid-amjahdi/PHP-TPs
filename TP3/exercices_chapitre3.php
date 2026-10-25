<?php
declare(strict_types=1);

// Exercice 1 : paramètres optionnels et référence
function calculerRemise(float $prixHT, int $pourcentage = 10): float { return $prixHT * ($pourcentage / 100); }
function appliquerTaxe(float &$prix, float $tauxTaxe = 0.20): void { $prix *= 1 + $tauxTaxe; }
$prixArticle = 100.0; $remise = calculerRemise($prixArticle); $prixNet = $prixArticle - $remise; appliquerTaxe($prixNet);
echo "Exercice 1\nMontant remise : $remise EUR\nPrix final TTC : $prixNet EUR\n\n";

// Exercice 2 : arguments nommés
function genererImage(string $src, string $alt = 'Image', int $largeur = 300, int $hauteur = 200): string { return "<img src='$src' alt='$alt' width='$largeur' height='$hauteur'>"; }
echo "Exercice 2\n" . genererImage(hauteur: 500, src: 'logo.png') . "\n\n";

// Exercice 3 : déballage associatif
function creerUrl(string $protocole, string $domaine, string $page): string { return "$protocole://$domaine/$page"; }
$configuration = ['page' => 'contact.php', 'protocole' => 'https', 'domaine' => 'mon-site.com'];
echo "Exercice 3\n" . creerUrl(...$configuration) . "\n\n";

// Exercice 4 : closure et use
$prixHT = [10, 20, 50, 100]; $tauxDollar = 1.10;
$convertisseur = function (float $prix) use ($tauxDollar): float { return $prix * $tauxDollar; };
echo "Exercice 4\n"; print_r(array_map($convertisseur, $prixHT));

// Exercice 5 : fonction fléchée
echo "Exercice 5\n"; print_r(array_map(fn(float $prix): float => $prix * $tauxDollar, $prixHT));
