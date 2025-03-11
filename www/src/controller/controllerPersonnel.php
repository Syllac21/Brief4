<?php
session_start();
require_once(dirname(__DIR__, 1) . '/model/personnel.php');
require_once(dirname(__DIR__, 1) . '/model/Log.php'); // ✅ Inclusion du modèle Logs

$personnel = new Personnel;
$logObj = new Log(); // ✅ Création de l'objet Log

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($nom) || empty($prenom) || empty($password) || empty($password2) || empty($login)) {
        echo "Veuillez remplir tous les champs!";
    } elseif ($password !== $password2) {
        echo "Les mots de passe ne correspondent pas!";
    } else {
        // ✅ Ajouter le personnel et récupérer son ID
        $lastId = $personnel->ajoutPersonnel($_POST);
        
        // ✅ Enregistrer un log avec le format demandé
        $logObj->addLog( "Ajout d'un personnel", "Ajout du personnel : $nom $prenom", $_SESSION['id_personnel']);

        header("Location: /?page=dashboard&table=employe&id=" . $lastId);
        exit();
    }

    // ✅ Log lors de l'archivage d'un personnel
    if (isset($_POST['id'])) {
        $personnel->archivePersonnel($_POST['id']);
        $logObj->addLog("Archivage du personnel ID: {$_POST['id']}", "Archivage d'un personnel", $_SESSION['id_personnel']);

        header('Location: /?page=dashboard&table=personnel');
        exit();
    }
}
