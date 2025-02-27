<?php
//Démarre une nouvelle session ou reprend une session existante
session_start();
class AnimalController {

    public function ajouterAnimal() {
        // Vérifiez si la demande est POST et si les données du formulaire existent
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['animalName'])) {
            $name = trim($_POST['animalName']);
            $gender = $_POST['animalGender'];
            $number = trim($_POST['animalNumber']);
            $country = trim($_POST['animalCountry']);
            $dob = $_POST['animalDOB'];
            $arrivalDate = $_POST['animalArrivalDate'];
            $description = trim($_POST['animalDescription']);
            $imageUrl = trim($_POST['animalImage']);
            $cage = trim($_POST['animalCage']);
            // Effectuez vos validations et traitements ici
            $errors = [];

            if ($name === '') {
                $errors[] = "Le nom ne peut pas être vide.";
            }
            if ($gender === '...') {
                $errors[] = "Veuillez sélectionner un genre.";
            }
            if (!preg_match('/^\d+$/', $number)) {
                $errors[] = "Le numéro doit contenir uniquement des chiffres.";
            }
            if ($country === '') {
                $errors[] = "Le pays ne peut pas être vide.";
            }
            if ($dob === '') {
                $errors[] = "Veuillez entrer une date de naissance.";
            }
            if ($arrivalDate === '') {
                $errors[] = "Veuillez entrer une date d'arrivée.";
            }
            if ($dob && $arrivalDate && strtotime($dob) > strtotime($arrivalDate)) {
                $errors[] = "La date de naissance ne peut pas être après la date d'arrivée.";
            }
            if ($description === '') {
                $errors[] = "La description ne peut pas être vide.";
            }
            if (!preg_match('/^(https?:\/\/.*\.(?:png|jpg|jpeg|gif|bmp))$/i', $imageUrl)) {
                $errors[] = "Veuillez entrer une URL d'image valide (terminant par .png, .jpg, etc.).";
            }
            if ($cage === '') {
                $errors[] = "Le champ 'Cage' ne peut pas être vide.";
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
            } else {
                // Traitement pour ajouter l'animal (enregistrer dans la base de données, etc.)
                echo "<p>Formulaire valide ! Ajout de l'animal...</p>";
            }
        }
    }
}
// Créez une instance du contrôleur et appelez la méthode pour ajouter un animal
$controller = new AnimalController();
$controller->ajouterAnimal();

?>
