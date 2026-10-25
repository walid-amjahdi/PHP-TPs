<?php
$dossier = "uploads/";
$extensionsAutorisees = [
"jpg",
"jpeg",
"png",
"gif"
];
if (is_dir($dossier)) {
$fichiers = scandir($dossier);
foreach ($fichiers as $fichier) {
// Ignorer . et ..
if ($fichier == "." || $fichier == "..") {
continue;
}
// Récupérer l'extension
$extension = strtolower(
pathinfo($fichier, PATHINFO_EXTENSION)
);
// Vérifier que c'est une image
if (in_array($extension, $extensionsAutorisees)) {
echo "<img src='uploads/$fichier' ";
echo "width='200' ";
echo "style='margin:10px;'>";
}
}
}
?>