<?php
require_once(dirname(__DIR__, 1) . '/model/personnel.php');

// Récupérer tous les personnels
$personnel = new Personnel;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $poste = htmlspecialchars($_POST['poste']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $login = htmlspecialchars($_POST['login']);


if (empty($nom) || empty($prenom) || empty($poste) || empty($password) || empty($password2) || empty($login)) {
    $errorMessage = "Veuillez remplir tous les champs!";
    echo $errorMessage;
} elseif ($password !== $password2) {
    $errorMessage = "Les mots de passe ne correspondent pas!";
    
    echo $errorMessage;
} else {
    // $success = true;
    $lastId = $personnel->ajoutPersonnel($_POST);
    header("Location: /?page=dashboard&table=employe&id=" . $lastId);
    exit();

}

}


