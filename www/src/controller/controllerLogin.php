<?php
session_start();
require_once '../model/Personnel.php';
$persoObj = new Personnel();

$login =trim(strip_tags($_POST['login']));
$password = trim(strip_tags($_POST['password']));
$time = time();

if ($login != '' && 
    $password != '') {
    $personnel = $persoObj->loginPersonnel($login, $password);
    if ($personnel) {
        $_SESSION['login'] = $login;
        $_SESSION['time'] = $time;
        
        var_dump($_SESSION);
        // header('Location: /');
    } else {
        echo 'Erreur de connexion';
        // header('Location: /');
    }
}