<?php
require_once '../model/Espece.php';
$espece = new Espece();

echo 'ok';

// if(isset($_GET['id'])){
//     $id = intval($_GET['id']);
//     if(
//         is_int($id) &&
//         isset($_POST) &&
//         trim(strip_tags($_POST['nom'])) !== ''
//     ){
//         $nom = trim(strip_tags($_POST['nom']));
//         $espece->updateSpecie($id, $nom);
//     }
//     // header('location:/?page=dashboard&table=espece');
// }
