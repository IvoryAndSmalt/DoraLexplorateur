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

<h1 id="attention">
    NE PAS ENTRER DANS LA CABANE DE JARDIN EN REGARDANT VOTRE TELEPHONE (càd : site non responsive)
</h1>
<!-- HEADER ET CHEMIN -->
<a id ="accueil" href="./index.php"><img src="img/accueil.png" alt="pancarte accueil"></a>
<header id="header">
<!-- <h1>Dora L'explorateur</h1> -->
<div class="contenu">
<?php
$parent = "../";
if (isset($_GET['dir'])) {
    boutonRetour($_GET['dir']);
    liste($_GET['dir']);
} else {
    liste($parent);
}

function boutonRetour($dir)
{
    $retour = strrpos($dir, "/");
    $retour = substr($dir, 0, $retour);
    echo '<p><a id="retour" href="?dir=' . $retour . '">Retour</a></p>';
}

function liste($dir)
{
    if (isset($_GET['dir'])) {

        $dir = '../' . $_GET['dir'];
    } else {
        $dir = '../';
    }
    if ($handle = opendir($dir)) {
        echo str_replace("../", "Localhost/", $dir);?>
    </div>

</header>

<!-- FONCTION AFFICHER LES DOSSIERS -->

<div class="dossier">
    <?php
$fichiersAZipper = array();
        while (false !== ($en = readdir($handle))) {
            if ($en != '.' && $en != '..' && $en != '.git') {

                array_push($fichiersAZipper, $en);

                if (isset($_GET['dir'])) {
                    $lienget = "?dir=" . $_GET['dir'] . "/" . $en;
                    $path_parts = pathinfo($_GET['dir'] . "/" . $en);

                    // S'IL Y A UNE EXTENSION
                    if (isset($path_parts['extension'])) {
                        $extension = $path_parts['extension'];
                        switch ($extension) {
                            case 'png';
                            case 'jpg';
                            case 'svg';
                            case 'gif';
                                $sourceimg = "img/rose.png"
                                ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir'] . "/" . $en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
                                </div>
                            <?php
                            break;

                            case 'php';
                                $sourceimg = "img/pot3.png";
                                $content = file_get_contents("../" . $_GET['dir'] . "/" . $en);
                                ?>
                                <div class="imalien">
                                    <form action="/download.php" method="post">
                                        <input type="hidden" name="content" value=<?=$content?>>
                                        <input type="submit" value="Afficher le texte">
                                    </form>
                                </div>
                            <?php
                            break;

                            case 'html';
                            case 'css';
                            case 'js';
                                $sourceimg = "img/pot1.png"
                                ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir'] . "/" . $en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
                                </div>
                            <?php
                            break;

                            default:
                                $sourceimg = "img/citrouille.png"
                                ?>
                                <div class="imalien">
                                    <a href="/<?=$_GET['dir'] . "/" . $en?>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
                                </div>
                            <?php
                            break;
                        }
                    }
                    // S'IL N'Y A PAS D'EXTENSION : C'EST UN DOSSIER
                    else {
                        $sourceimg = "img/dossiers.png"
                        ?>
                        <div class="imalien">
                            <a href="<?=$lienget?>"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
                        </div>
                    <?php
                    }
                }
                // CAS OU ON EST A L'ACCUEIL
                else if ($en != 'index.html') {?>
                    <div class="imalien">
                        <a href="?dir=<?=$en?>"><img id="lien" src="img/dossiers.png" alt="vlan le dossier"/><?="<p>" . $en . "</p>"?></a><br>
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
    <img src="img/tondeuse.png" alt="dessin tondeuse" id="toggleRight" class="voiture">
    <div id="gazon">
    </div>
</footer>

<script src="assets/js/script.js"></script>

</body>
<a href="/download.php?fill=<?=$myfile?>>" target="_blank"><img id="lien" src="<?=$sourceimg?>" alt="vlan le dossier"/><?="test"?></a><br>
</html>
<!-- POUR SCANNER UN DOSSIER, UTILISER LE CHEMIN REEL
POUR LIRE UN FICHIER EN PARTICULIER, UTILISER LE CHEMIN AVEC LOCALHOST, URL -->