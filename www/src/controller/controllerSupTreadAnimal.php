<?php
    require_once '../model/Animaux.php';
    $animalObj = new Animaux();
    if(
        isset($_GET) &&
        isset($_GET['idAnimal']) &&
        isset($_GET['idPersonnel'])
    ){
        $idAnimal = intval($_GET['idAnimal']);
        $idPersonnel = intval($_GET['idPersonnel']);
        if(is_int($idAnimal) && is_int($idPersonnel)){
        $animalObj->removeSoigneur($idAnimal, $idPersonnel);
        }
    header('Location: /?page=dashboard&table=employe&id=' . $_GET['idPersonnel']);
    exit();
}