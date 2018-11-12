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

    <!-- CHANGER DE DOSSIER ACTIF -->
<!-- // chdir (directory)

// dossier courant
echo getcwd() . "<br>";

// chdir = change de dossier
// chdir () change le dossier courant de PHP en directory
chdir('logo');

// dossier courant
echo getcwd() . "<br>"; -->

<!-- AFFICHER LES DOSSIERS -->
<!-- if ($handle = opendir('/xampp/htdocs/fonction-dossier_PHP')) {
    echo "Gestionnaire du dossier : $handle<br>";
    echo "Entrées :<br>";

    /* Ceci est la façon correcte de traverser un dossier. */
    while (false !== ($en = readdir($handle))) {
        echo "$en<br>";
    }

    /* Ceci est la MAUVAISE façon de traverser un dossier. */
    while ($entry = readdir($handle)) {
        echo "$entry<br>";
    }

    closedir($handle);
} -->

<!-- AUTRE METHODE POUR AFFICHER -->
<!-- $dir    = '/xampp/htdocs/fonction-dossier_PHP';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2); -->

<?php
listerUnDossier();
function listerUnDossier(){
    $nb_fichier = 0;
    echo '<ul>';
    if($dossier = opendir('C:\xampp\htdocs'))
    {
        while(false !== ($fichier = readdir($dossier)))
        {
            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
            {
                $nb_fichier++;
                echo '<li> <a href="C:\xampp\htdocs\\' . $fichier . '">' . $fichier . '</a></li>';
            }
        }
        echo '</ul><br>';
        echo 'Il y a '. $nb_fichier .' fichier(s) dans le dossier <br>';
        echo getcwd() . "<br>"; 
        closedir($dossier);
    }
    else
        echo '<br> Le dossier n\'a pas pu être ouvert';
}



?>


</body>
<script src="assets/js/script.js"></script>
</html>