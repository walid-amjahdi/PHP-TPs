<?php
declare(strict_types=1);

function titre(string $s): void { echo "\n=== $s ===\n"; }

// Fonctions de base
function saluer(): void { echo "Bonjour tout le monde !\n"; }
function direBonjour(string $nom): void { echo "Bonjour $nom !\n"; }
function bienvenue(string $role = 'Visiteur'): void { echo "Bienvenue, votre rôle est : $role\n"; }
function additionner(int|float $a, int|float $b): int|float { return $a + $b; }
function multiplier(float $a, float $b): float { return $a * $b; }
titre('Fonctions de base');
saluer(); direBonjour('Alice'); bienvenue(); bienvenue('Admin');
echo '5 + 3 = ' . additionner(5, 3) . "\n";
echo '2.5 x 4 = ' . multiplier(2.5, 4) . "\n";

// Arguments nommés et déballage
function creerUtilisateur(string $nom, string $email, string $role): void { echo "Utilisateur $nom ($email), rôle : $role\n"; }
function configurerSession(int $duree = 3600, bool $securise = true, bool $httpOnly = true, string $nom = 'PHPSESSID'): void { echo "Session : $nom, durée=$duree\n"; }
titre('Arguments nommés et déballage');
creerUtilisateur('Alice', 'alice@example.com', 'Admin');
creerUtilisateur(role: 'Admin', nom: 'Alice', email: 'alice@example.com');
configurerSession(nom: 'MA_SESSION');
$donnees = ['email' => 'contact@test.com', 'role' => 'Auteur', 'nom' => 'Jean'];
creerUtilisateur(...$donnees);
function calculerVolume(int $l, int $L, int $h): int { return $l * $L * $h; }
echo 'Volume = ' . calculerVolume(...[10, 5, 2]) . "\n";
function creerProfil(string $pseudo, string $statut, bool $estActif): void { echo "Profil : $pseudo ($statut) - Actif : " . ($estActif ? 'Oui' : 'Non') . "\n"; }
creerProfil(...['statut' => 'Modérateur', 'estActif' => true, 'pseudo' => 'Shadow99']);
$panier = ['Pain', ...['Carotte', 'Poireau'], 'Fromage', ...['Pomme', 'Banane']]; print_r($panier);
$configurationFinale = [...['theme' => 'clair', 'langue' => 'fr'], ...['theme' => 'sombre', 'langue' => 'en'], 'version' => '2.0']; print_r($configurationFinale);

// Variadiques, portée et référence
function additionnerTout(int|float ...$nombres): int|float { return array_sum($nombres); }
function introduireEquipe(string $chef, string ...$membres): void { echo "Chef : $chef; membres : " . implode(', ', $membres) . "\n"; }
function listerMotsCles(string ...$mots): void { echo implode(' | ', $mots) . "\n"; }
titre('Variadiques');
echo additionnerTout(5, 10) . "\n"; echo additionnerTout(1, 2, 3, 4, 5) . "\n";
introduireEquipe('Alice', 'Bob', 'Charlie', 'David'); listerMotsCles('PHP', 'Programmation', 'Web');
$pays = 'France';
function afficherPays(): void { global $pays; echo "Le pays est : $pays\n"; }
function incrementerCompteur(): void { static $compteur = 0; echo 'Valeur : ' . ++$compteur . "\n"; }
function ajouterDixParValeur(int $n): void { $n += 10; }
function ajouterDixParReference(int &$n): void { $n += 10; }
titre('Portée et référence');
afficherPays(); incrementerCompteur(); incrementerCompteur(); incrementerCompteur();
$valeur = 5; ajouterDixParValeur($valeur); echo "Par valeur : $valeur\n"; ajouterDixParReference($valeur); echo "Par référence : $valeur\n";

// Closures, arrow functions, tableaux et usort
titre('Closures et arrow functions');
$saluerClosure = function (string $nom): string { return "Bonjour $nom"; }; echo $saluerClosure('Alice') . "\n";
$tva = 0.20; $calculerTTC = function (float $prix) use ($tva): float { return $prix * (1 + $tva); }; echo 'TTC = ' . $calculerTTC(100) . "\n";
$carre = fn(int $n): int => $n * $n; echo 'Carré = ' . $carre(4) . "\n";
$facteur = 3; $multiplierFacteur = fn(int $n): int => $n * $facteur; echo 'Facteur = ' . $multiplierFacteur(5) . "\n";
print_r(array_filter([1, 2, 3, 4, 5, 6], fn(int $n): bool => $n % 2 === 0));
print_r(array_map(fn(string $nom): string => ucfirst($nom), ['alice', 'bob', 'charlie']));
$produits = [['nom' => 'Livre', 'prix' => 15], ['nom' => 'Stylo', 'prix' => 3], ['nom' => 'Sac', 'prix' => 45]];
usort($produits, fn(array $a, array $b): int => $a['prix'] <=> $b['prix']); print_r($produits);

// Callbacks
function verifierTexte(string $texte, callable $formatteur): void { echo 'Résultat final : ' . $formatteur($texte) . "\n"; }
function inverserTexte(string $str): string { return strrev($str); }
titre('Callbacks');
verifierTexte('sécurité web', fn(string $t): string => strtoupper($t));
$prefixe = '[ALERTE]'; verifierTexte('Le serveur est en surchauffe !', function (string $m) use ($prefixe): string { return $prefixe . ' ' . trim($m); });
verifierTexte('bonjour', 'ucfirst'); verifierTexte('PHP 8', inverserTexte(...));
function filtrerPanier(array $produits, callable $condition): array { $resultat = []; foreach ($produits as $p) { if ($condition($p)) { $resultat[] = $p; } } return $resultat; }
print_r(filtrerPanier([['nom' => 'Clavier', 'prix' => 80], ['nom' => 'Souris', 'prix' => 25], ['nom' => 'Écran', 'prix' => 300]], fn(array $p): bool => $p['prix'] > 50));
