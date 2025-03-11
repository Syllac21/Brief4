<?php
require_once (dirname(__DIR__,1).'/model/Animaux.php');
$objAnimal = new Animaux;

if(isset($_POST)){
    
    if(
        isset($_POST['animalName']) &&
        isset($_POST['animalNumber']) &&
        isset($_POST['animalDescription']) &&
        isset($_POST['animalImage']) &&
        isset($_POST['animalcage']) &&
        isset($_POST['id_animal']) &&
        is_numeric(intval($_POST['id_animal'])) &&
        is_numeric(intval($_POST['animalcage']))

        ){
            $postData =[];
            $postData['nom'] = $_POST['animalName'];
            $postData['numero'] = $_POST['animalNumber'];
            $postData['description'] = $_POST['animalDescription'];
            $postData['image'] = $_POST['animalImage'];
            $postData['id_cage'] = $_POST['animalcage'];
            $postData['id_animal'] = $_POST['id_animal'];
            
            $objAnimal->updateAnimal($postData);
            header('location: /?page=dashboard&table=animaux');
        
    }
}