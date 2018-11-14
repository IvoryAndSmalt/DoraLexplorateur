<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dora l'explorateur</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<!-- HEADER ET CHEMIN -->
    <h1>Dora L'explorateur</h1>
    <a href="./">Accueil</a>
<div class="contenu">
<?php
$parent = "/var/www/html/";
if(isset($_GET['dir'])){
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
<!-- FONCTION AFFICHER LES DOSSIERS -->

<div class="dossier">
    <?php
        while (false !== ($en = readdir($handle))) {
            if($en != '.' && $en != '..' && $en != '.git') {
                if(isset($_GET['dir'])){
                    $lienget="index.php?dir=".$_GET['dir'] . "/" . $en;
                    $path_parts = pathinfo($_GET['dir'] . "/" . $en);

                    // S'IL Y A UNE EXTENSION
                    if(isset($path_parts['extension'])){
                        $extension = $path_parts['extension'];
                        switch ($extension) {
                            case 'png';
                            case 'jpg';
                            case 'svg';
                            $sourceimg = "img/DoraMap.png"
                            ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir']."/".$en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                                </div><br>
                            <?php
                            break;

                            case 'php';
                            case 'html';
                            case 'css';
                            case 'js';
                            $sourceimg = "img/car.svg"
                            ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir']."/".$en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                                </div><br>
                            <?php
                            break;

                            default:
                            $sourceimg = "img/question-mark.svg"
                            ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir']."/".$en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                                </div><br>
                            <?php
                            break;
                            
                        }
                    }

                    // S'IL N'Y A PAS D'EXTENSION : C'EST UN DOSSIER
                    else{
                        $sourceimg = "img/folder.png"
                        ?>
                        <div class="imalien">
                            <a href="<?=$lienget?>"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                        </div><br>
                    <?php
                    }
                }
                else{
                ?>
                    <div class="imalien">
                        <a href="index.php?dir=<?=$en?>"><img id="lien" src="img/folder.png" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
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