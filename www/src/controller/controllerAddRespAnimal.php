<?php
require_once '../model/Animaux.php';
$animalObj = new Animaux(); // Création d'une instance de la classe Animaux

if(
    isset($_GET) &&
    isset($_GET['idAnimal']) &&
    isset($_GET['idPersonnel'])
){
    $idAnimal = intval($_GET['idAnimal']);
    $idPersonnel = intval($_GET['idPersonnel']);
    if(is_int($idAnimal) && is_int($idPersonnel)){
        $animalObj->updateResp($idAnimal, $idPersonnel);
    }
    header('location:/?page=dashboard&table=employe&id=' . $idPersonnel);
}