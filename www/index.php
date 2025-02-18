<?php
require_once 'src/model/Model.php';
function getAnimaux() : array
    {
        $mysqlClient=dbConnect();
        $animauxStatement = $mysqlClient->prepare('SELECT * FROM animal');
        $animauxStatement->execute();
        $animaux=$animauxStatement->fetchAll();

        return $animaux;
    } 
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
    $animaux=getAnimaux();
    var_dump($animaux);
    ?>
</body>
</html>