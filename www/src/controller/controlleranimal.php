<?php
require_once (dirname(__DIR__,1).'/model/Animaux.php');

$objAnimal = new Animaux;
if(isset($_POST)){
    $postData = $_POST;
    if(
        isset($postData['animalName']) &&
        isset($postData['animalGender']) &&
        isset($postData['animalNumber']) &&
        isset($postData['animalCountry']) &&
        isset($postData['animalBirthDate']) &&
        isset($postData['animalArrivalDate']) &&
        isset($postData['animalDescription']) &&
        isset($postData['animalSpecies']) &&
        isset($postData['animalImage']) &&
        isset($postData['animalcage']) &&
        isset($postData['id_personnel']) &&
        is_numeric(intval($postData['id_personnel'])) &&
        is_numeric(intval($postData['animalcage']))
        ){
            $especes=$postData['animalSpecies'];
            foreach($especes as $espece){
                if(!isset($espece) || !is_numeric(intval($espece))){
                    var_dump($postData);
                    exit;
                }
            }
        $nom = trim(strip_tags($postData['animalName']));
        $genre = trim(strip_tags($postData['animalGender']));
        $numero = trim(strip_tags($postData['animalNumber']));
        $pays = trim(strip_tags($postData['animalCountry']));
        $dateNaissance = trim(strip_tags($postData['animalBirthDate']));
        $dateArrivee = trim(strip_tags($postData['animalArrivalDate']));
        $description = trim(strip_tags($postData['animalDescription']));
        $image = trim(strip_tags($postData['animalImage']));
        $cage = intval(trim(strip_tags($postData['animalcage'])));
        $id_responsable = intval($postData['id_personnel']);
        
        $objAnimal->addAnimal($nom, $genre, $numero, $pays, $dateNaissance, $dateArrivee, $description, $image, $cage, $id_responsable, $id_responsable, $espece);
        header('location: /?page=dashboard&table=animaux');
    }
}
