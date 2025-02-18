<?php
session_start();
require_once 'src/model/Personnel.php';
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
        header('Location: /');
    } else {
        header('Location: /');
    }
}