<?php
require_once(dirname(__DIR__, 1) . '/model/Animaux.php');

if (!empty($_GET['delete_id']) && !empty($_GET['confirm_delete'])) {
    $objAnimal = new Animaux;
    $result = $objAnimal->archiveAnimal($_GET['delete_id']);
        header('Location: /?page=dashboard&table=animaux');
    exit();
}