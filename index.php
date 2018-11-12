<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dora l'explorateur</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<!-- Créer un  explorateur de fichiers en utilisant PHP. 
L'explorateur doit permettre de naviguer dans tous 
vos dossiers présents sur votre serveur local, 
de visualiser les fichiers si le type le permet 
(images, texte) et proposer le téléchargement sinon. 
Vous devrez créer une identité visuelle ergonomique et 
originale pour votre projet.

Bonus : Intégrer votre projet avec Twig.  -->

<body>

    CHANGER DE DOSSIER ACTIF

<!-- // chdir (directory)

// dossier courant
echo getcwd() . "<br>";

// chdir = change de dossier
// chdir () change le dossier courant de PHP en directory
chdir('logo');

// dossier courant
echo getcwd() . "<br>"; -->


AFFICHER LES DOSSIERS
<?php
if ($handle = opendir('/home/stagiaire/Bureau/html/')) {
    echo "Vous êtes dans le dossier : $handle<br>";

    /* Ceci est la façon correcte de traverser un dossier. */
    while (false !== ($en = readdir($handle))) {
        echo '<a href='.$en.'>'.$en.'</a><br>';
    }
    echo getcwd();
}
echo getcwd();
chdir("assets");?>

<a href="<?php echo getcwd() . "\n";?>">assets</a><br>

AUTRE METHODE POUR AFFICHER
<!-- $dir    = '/xampp/htdocs/fonction-dossier_PHP';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2); -->

    
</body>
<script src="assets/js/script.js"></script>
</html>