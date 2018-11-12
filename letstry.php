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

<?php

    function scan($dir) {
    // On regarde déjà si le dossier existe
    if(is_dir($dir)) {
        // On le scan et on récupère dans un tableau le nom des fichiers et des dossiers
        $files = scandir($dir);

        // On supprime . et .. qui sont respectivement le dossier courant et le dossier précédent
        unset($files[0], $files[1]);

        // On tri le tableau de façon intéligente (à la façon humaine)
        // http://www.php.net/function.natcasesort
        natcasesort($files);

        // On commence par afficher les dossiers
        foreach($files as $f) {
            // S'il y a un dossier
            if(is_dir($dir.$f)) {
                // On affiche alors les données
                echo '<li class="folder">'.$f.'</li>';
                echo '<ul class="tree">';

                // Et du coup comme c'est un dossier, un le rescan
                scan($dir.$f."/");

                echo '</ul>';
            }
        }

        // Puis on affiche les fichiers
        foreach($files as $f) {
            // S'il y a un fichier
            if(is_file($dir.$f)) {
                echo '<li class="file" rel="'.$dir.$f.'">'.$f.'</li>';
            }
        }
    }
}
 ?>

    CHANGER DE DOSSIER ACTIF <br>

<!-- // chdir (directory)

// dossier courant
echo getcwd() . "<br>";

// chdir = change de dossier
// chdir () change le dossier courant de PHP en directory
chdir('logo');

// dossier courant
echo getcwd() . "<br>"; -->


<a href="">$en</a> <br>
<!-- AFFICHER LES DOSSIERS -->
<?php  

if ($handle = opendir("C:\wamp64\www\DoraLexplorateur")) {
    echo "Gestionnaire du dossier : ".$handle."<br>";
    echo "Entrées :<br>";

    /* Ceci est la façon correcte de traverser un dossier. */
    while (false !== ($en = readdir($handle))) { ?>
        <a href="index.php"><?php echo$en ?></a> <br>
         <!-- echo "$en<br>" -->
        <?php
    }

    // /* Ceci est la MAUVAISE façon de traverser un dossier. */
    // while ($entry = readdir($handle)) {
    //     echo "$entry<br>";
    // }

    closedir($handle);
}

?>


<!-- AFFICHER LES DOSSIERS -->
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