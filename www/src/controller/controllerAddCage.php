<?php
require_once(dirname(__DIR__, 1) . '/model/Cage.php');
$cageObj = new Cage;
$postdata = $_POST;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(
        isset($postdata['numero']) &&
        isset($postdata['allee']) && 
        isset($postdata['salle']) &&
        is_numeric($postdata['numero']) &&
        is_numeric($postdata['allee']) &&
        is_numeric($postdata['salle'])
        ){
        $cageObj->addCage($postdata);
    }
    header('Location: /?page=dashboard&table=cage');
    exit();
}