<?php
require_once(dirname(__DIR__) . '/model/Espece.php');

$espece = new Espece;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nom'])){
        $nom = trim(strip_tags($_POST['nom']));
        $espece->addSpecie($nom);
        header('Location: /?page=dashboard&table=espece');
    }
}