<?php
    require_once '../model/Animaux.php';
    $animalObj = new Animaux();
    // echo 'test';
    if(
        isset($_GET) &&
        isset($_GET['idAnimal']) &&
        isset($_GET['idPersonnel'])
    ){
        $idAnimal = intval($_GET['idAnimal']);
        $idPersonnel = intval($_GET['idPersonnel']);
        // echo 'idAnimal : ' . $idAnimal . ' idPersonnel : ' . $idPersonnel;
        if(is_int($idAnimal) && is_int($idPersonnel)){
            $animalObj->updateSoigneur($idAnimal, $idPersonnel);
        }
    header('Location: /?page=dashboard&table=employe&id=' . $_GET['idPersonnel']);
    exit();
}