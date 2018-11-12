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

    CHANGER DE DOSSIER ACTIF<br>

<!-- // chdir (directory)

// dossier courant
echo getcwd() . "<br>";

// chdir = change de dossier
// chdir () change le dossier courant de PHP en directory
chdir('logo');

// dossier courant
echo getcwd() . "<br>"; -->


AFFICHER LES DOSSIERS<br>

<?php


if (isset($_GET['dir'])){
    liste($_GET['dir']);
}
else{
    liste('/var/www/html/');
}

function liste($dir){
    if (isset($_GET['dir'])){
        $parent = "/var/www/html/";
    $dir = '/var/www/html/' . $_GET['dir'];
    echo "NOTRE DOSSIER<br>";
    echo getcwd() . "<br>";
    echo "NOTRE DOSSIER<br>";
    }
    else {
        $dir = '/var/www/html/';
    }
    if ($handle = opendir($dir)) {
        echo "Vous êtes dans le dossier : $dir<br>";
    
        while (false !== ($en = readdir($handle))) {
            echo '<a href=index.php?dir='.$_GET['dir']."/".$en . '>' . $en . '</a><br>';
        }
    }
}

?>
</body>

<script src="assets/js/script.js"></script>

</html>