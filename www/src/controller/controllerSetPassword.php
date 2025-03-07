<?php
require_once '../model/Personnel.php';
$objPersonnel = new Personnel;

$postData = $_POST;

if(
    isset($postData['id'])&&
    is_numeric($postData['id'])&&
    isset($postData['oldPassword'])&&
    isset($postData['newPassword'])&&
    isset($postData['confirmPassword'])
    ){
        $personnel = $objPersonnel->getPersonnelById($postData['id']);
        $oldPassword = trim(strip_tags($postData['oldPassword']));
        $newPassword = trim(strip_tags($postData['newPassword']));
        $confirmPassword = trim(strip_tags($postData['confirmPassword']));
    if(password_verify($postData['oldPassword'], $personnel['mot_de_passe']) && $postData['newPassword'] == $postData['confirmPassword']){
        $password = password_hash(trim(strip_tags($postData['newPassword'])), PASSWORD_DEFAULT);
        $objPersonnel->updatePassword($postData['id'], $password);
        header('location: /?page=dashboard&table=personnel');
    }
        
}else{
    echo('erreur');
}