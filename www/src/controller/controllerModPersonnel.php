<?php
require_once(dirname(__DIR__, 1) . '/model/personnel.php');

$personnel = new Personnel;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $postdata['id_personnel'] = htmlspecialchars($_POST['id']);
    $postdata['nom'] = htmlspecialchars($_POST['nom']);
    $postdata['prenom'] = htmlspecialchars($_POST['prenom']);
    $postdata['poste'] = htmlspecialchars($_POST['poste']);
    $postdata['login'] = htmlspecialchars($_POST['login']);

    // Validate input
    if (empty($postdata['nom']) || empty($postdata['prenom']) || empty($postdata['poste']) || empty($postdata['login'])) {
        die("Veuillez remplir tous les champs!"); // Stop execution and display error
    }

    // Update personnel
    if ($personnel->updatePersonnel($postdata)) {
        header("Location: /?page=dashboard&table=personnel");
        exit();
    } else {
        die("Échec de la mise à jour!");
    }
}
?>
