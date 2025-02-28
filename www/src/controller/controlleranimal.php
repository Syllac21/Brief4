<?php
// Démarre une nouvelle session ou reprend une session existante
// session_start();
// require_once 'tableanimal.php';

class AnimalController {

    public function ajouterAnimal() {
        // Vérifiez si la demande est POST et si les données du formulaire existent
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['animalName'])) {
            // Utilisation de htmlspecialchars pour éviter les injections XSS
            $name = htmlspecialchars(trim($_POST['animalName']), ENT_QUOTES, 'UTF-8');
            $gender = htmlspecialchars($_POST['animalGender'], ENT_QUOTES, 'UTF-8');
            $number = htmlspecialchars(trim($_POST['animalNumber']), ENT_QUOTES, 'UTF-8');
            $country = htmlspecialchars(trim($_POST['animalCountry']), ENT_QUOTES, 'UTF-8');
            $birthDate = htmlspecialchars($_POST['animalBirthDate'], ENT_QUOTES, 'UTF-8');
            $arrivalDate = htmlspecialchars($_POST['animalArrivalDate'], ENT_QUOTES, 'UTF-8');
            $species = htmlspecialchars($_POST['animalSpecies'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars(trim($_POST['animalDescription']), ENT_QUOTES, 'UTF-8');
            $imageUrl = htmlspecialchars(trim($_POST['animalImage']), ENT_QUOTES, 'UTF-8');
            $cage = htmlspecialchars(trim($_POST['animalCage']), ENT_QUOTES, 'UTF-8');
            $responsable = htmlspecialchars(trim($_POST['animalResponsable']), ENT_QUOTES, 'UTF-8');
            
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
            if ($birthDate === '') {
                $errors[] = "Veuillez entrer une date de naissance.";
            }
            if ($arrivalDate === '') {
                $errors[] = "Veuillez entrer une date d'arrivée.";
            }
            if ($species === '') {
                $errors[] = "L'espèce ne peut pas être vide.";
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
            if ($responsable === '') {
                $errors[] = "Le champ 'Responsable' ne peut pas être vide.";
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    // Affichage des erreurs en toute sécurité
                    echo "<p>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
                }
            } else {
                // Traitement pour ajouter l'animal (enregistrer dans la base de données, etc.)
                echo "<p>Formulaire valide ! Ajout de l'animal...</p>";
            }
        }
    }
}


// Créez une instance du contrôleur et appelez la méthode pour ajouter un animal
// $controller = new AnimalController();
// $controller->ajouterAnimal();

?>
