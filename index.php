<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dora l'explorateur</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<!-- HEADER ET CHEMIN -->
    <h1>Dora L'explorateur</h1>
    <p><a href="./">Accueil</a></p>
<div class="contenu">
<?php
$parent = "/var/www/html/";
if (isset($_GET['dir'])){
    liste($_GET['dir']);
}

else{
    liste($parent);
}

function liste($dir){
    if (isset($_GET['dir'])){

    $dir = '/var/www/html/' . $_GET['dir'];
    }
    else {
        $dir = '/var/www/html/';
    }
    if ($handle = opendir($dir)) {
        echo str_replace("/var/www/html/", "Localhost/", $dir);
    ?>
</div>
<!-- HEADER ET CHEMIN -->


<!-- FONCTION AFFICHER LES DOSSIERS -->





<div class="dossier">
    <?php
        while (false !== ($en = readdir($handle))) {
            if($en !='.'&& $en != '..' && $en != '.git') {
                if(isset($_GET['dir'])){ 
                    $lienget="index.php?dir=".$_GET['dir'] . "/" . $en;
                    $path_parts = pathinfo($_GET['dir'] . "/" . $en);
                    if(isset($path_parts['extension'])){
                        $extension = $path_parts['extension'];
                    }
                    else{
                        $extension ="";
                    }
                    // $extension porte le STRING à tester dans le switch
                    ?>
                    
                    <div class="imalien">
                        <a href="<?=$lienget ?>"><img id="lien" src="img/car.svg" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                    </div><br>

                <?php
                }
                else{?>
                    <div class="imalien">
                        <a href="index.php?dir=<?=$en?>"><img id="lien" src="img/car.svg" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
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