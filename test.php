<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php

print_r($_GET);

$dossier = scandir($_GET['dossier']);

// print_r($dossier);

foreach ($dossier as $key => $file) {
    echo '<a href="">'.$file.'</a><br>';
}
?>

</body>
</html>