<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dora l'explorateur</title>
    <link rel="stylesheet" href="assets/css/stylemi.css">
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

if (isset($_GET['dir'])){
    liste($_GET['dir']);
}

else{
    liste('C:\wamp64\www\"');
}

function liste($dir){
    if (isset($_GET['dir'])){
        $parent = 'C:\wamp64\www\"';
    $dir = 'C:\wamp64\www\"' . $_GET['dir'];
    }
    else {
        $dir = 'C:\wamp64\www\"';
    }
    if ($handle = opendir($dir)) {
        echo "Vous êtes dans le dossier : $dir<br>";
    
        while (false !== ($en = readdir($handle))) {
            if(isset($_GET['dir'])){ ?>
                
                <a href="letstry.php?dir=<?php echo $_GET['dir'] . "/" . $en?>"><?php echo $en?></a><br>
                
            <?php
            }
            else{
                echo '<a href="letstry.php?dir='.$en . '">' . $en . '</a><br>';
            }
        }
    }
}

?>

<script src="assets/js/script.js"></script>

</body>

</html>