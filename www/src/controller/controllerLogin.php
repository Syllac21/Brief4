<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();

// Inclut le fichier Personnel.php
require_once '../model/Personnel.php';
$persoObj = new Personnel();
$allPersonnel = $persoObj->getAllPersonnel();

// Récupère et nettoie les données de login et password envoyées via POST
$login = trim(strip_tags($_POST['login']));
$password = trim(strip_tags($_POST['password']));
$time = time(); // Récupère l'heure actuelle

// Vérifie que les champs login et password ne sont pas vides
// if ($login != '' && $password != '') {
//     // Appelle la méthode loginPersonnel pour vérifier les identifiants
//     $personnel = $persoObj->loginPersonnel($login, $password);
//     if ($personnel) {
//         // Si les identifiants sont corrects, initialise les variables de session
//         $_SESSION['login'] = $login;
//         $_SESSION['time'] = $time;
//         $_SESSION['id_personnel'] = $personnel['id_personnel'];
//         $_SESSION['role'] = $personnel['role'];
//         // Redirige vers la page d'accueil
//         header('Location: /');
//     } else {
//         // Si les identifiants sont incorrects, affiche un message d'erreur et redirige vers la page de connexion
//         // echo 'Erreur de connexion';
//         header('Location: /');
//     }
// }

if($login != '' && $password!= ''){
    foreach($allPersonnel as $personnel){
        if($personnel['login'] == $login && password_verify($password, $personnel['mot_de_passe'])){
            $_SESSION['login'] = $login;
            $_SESSION['time'] = $time;
            $_SESSION['id_personnel'] = $personnel['id_personnel'];
            $_SESSION['role'] = $personnel['role'];
            header('Location: /');
        }
    }
}
