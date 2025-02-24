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
        // var_dump($personnel);
        $_SESSION['login'] = $login;
        $_SESSION['time'] = $time;
        $_SESSION['id_personnel'] = $personnel['id_personnel'];
        header('Location: /');
    } else {
        echo 'Erreur de connexion';
        header('Location: /');
    }
}
