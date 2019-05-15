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
    <h1>Vous êtes dans le dossier : </h1>
<div class="contenu">
<?php

if (isset($_GET['dir'])){
    liste($_GET['dir']);
}

else{
    liste('/xampp/htdocs/');
}

function liste($dir){
    if (isset($_GET['dir'])){
        $parent = "/xampp/htdocs/";
    $dir = '/xampp/htdocs/' . $_GET['dir'];
    }
    else {
        $dir = '/xampp/htdocs/';
    }
    if ($handle = opendir($dir)) {
        echo str_replace("/xampp/htdocs/", "Localhost/", $dir);
    ?>
</div>

<div class="dossier">
    <?php
        while (false !== ($en = readdir($handle))) {
            if($en !='.'&& $en != '..' && $en != '.git') {
                if(isset($_GET['dir'])){ 
                    $lienget="bibi.php?dir=".$_GET['dir'] . "/" . $en?>

                    <div class="imalien">
                        <a href="<?php echo $lienget ?>"><img id="lien" src="img/car.svg" alt="vlan le dossier"/><?=$en?></a>
                    </div><br>

                <?php
                }
                else{?>
                    <div class="imalien">
                        <a href="bibi.php?dir=<?=$en?>"><img id="lien" src="img/car.svg" alt="vlan le dossier"/><?=$en?></a><br>
                    </div>
                <?php
            }
        }
    }
}
}

?>

</div>
<script src="assets/js/script.js"></script>

</body>

</html>