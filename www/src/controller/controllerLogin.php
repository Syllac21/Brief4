<?php
session_start();
$login =trim(strip_tags($_POST['login']));
$password = trim(strip_tags($_POST['password']));
$time = time();

if ($login != '' && 
    $password != '') {
    $_SESSION['login'] = $login;
    $_SESSION['time'] = $time;
    header('Location: /');
} else {
    header('Location: /');
}