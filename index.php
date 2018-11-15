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
<header id="header">
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
        echo str_replace("/var/www/html/", "Localhost/", $dir);?>
    </div>
</header>
    
<!-- FONCTION AFFICHER LES DOSSIERS -->

<div class="dossier">
    <?php
    $fichiersAZipper = array();
        while (false !== ($en = readdir($handle))) {
            if($en != '.' && $en != '..' && $en != '.git') {

                array_push($fichiersAZipper, $en);

                if(isset($_GET['dir'])){
                    $lienget="?dir=".$_GET['dir'] . "/" . $en;
                    $path_parts = pathinfo($_GET['dir'] . "/" . $en);

                    // S'IL Y A UNE EXTENSION
                    if(isset($path_parts['extension'])){
                        $extension = $path_parts['extension'];
                        switch ($extension) {
                            case 'png';
                            case 'jpg';
                            case 'svg';
                            case 'gif';
                            $sourceimg = "img/DoraMap.png"
                            ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir']."/".$en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                                </div><br>
                            <?php
                            break;

                            case 'php';
                            $sourceimg = "img/car.svg";
                            ?>
                                <div class="imalien">
                                    <a href="/"></a>
                                    <a href="/<?=$_GET['dir']."/".$en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a>
                                </div><br>
                            <?php
                            break;

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

                // CAS OU ON EST A L'ACCUEIL
                else if($en != 'index.html'){?>
                    <div class="imalien">
                        <a href="?dir=<?=$en?>"><img id="lien" src="img/folder.png" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
                    </div>
                <?php
                }
            }
        }
    }
}
       ?>
</div>

<footer id="footer">
<img src="images/tondeuse.png" alt="dessin tondeuse" id="toggleRight" class="voiture">
<img src="img/gazon.png" alt="gazon">
</footer>

<script src="assets/js/script.js"></script>

</body>

</html>