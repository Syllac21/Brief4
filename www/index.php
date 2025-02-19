<?php
require_once 'src/model/Model.php';
require_once 'src/model/Cage.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $cage = new Cage;
    $allCages = $cage->getAllCages();
    var_dump($allCages);
    ?>
</body>
</html>