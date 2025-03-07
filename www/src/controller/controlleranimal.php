<?php
if(isset($_POST)){
    $postData = $_POST;
    if(
        isset($postData['animalName']) &&
        isset($postData['animalGender']) &&
        isset($postData['animalNumber']) &&
        isset($postData['animalCountry']) &&
        isset($postData['animalBirthDate']) &&
        isset($postData['animalArrivalDate']) &&
        isset($postData['animalSpecies']) &&
        isset($postData['animalDescription']) &&
        isset($postData['animalimage']) &&
        isset($postData['animalCage']) &&
        is_numeric($postData['animalSpecies']) &&
        is_numeric($postData['animalCage'])
        
        ){
        $nom = trim(strip_tags($postData['animalName']));
        $genre = trim(strip_tags($postData['animalGender']));
        $numero = trim(strip_tags($postData['animalNumber']));
        $pays = trim(strip_tags($postData['animalCountry']));
        $dateNaissance = trim(strip_tags($postData['animalBirthDate']));
        $dateArrivee = trim(strip_tags($postData['animalArrivalDate']));
        $espece = intval(trim(strip_tags($postData['animalSpecies'])));
        $description = trim(strip_tags($postData['animalDescription']));
        $image = trim(strip_tags($postData['animalImage']));
        $cage = intval(trim(strip_tags($postData['animalCage'])));

    }
}
