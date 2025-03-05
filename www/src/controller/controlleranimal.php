<?php
// Démarre une nouvelle session ou reprend une session existante
// session_start();
// require_once 'tableanimal.php';
class AnimalController {

    public function ajouterAnimal() {
        // Vérifiez si la demande est POST et si les données du formulaire existent
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['animalName'])) {
            // Utilisation de htmlspecialchars pour éviter les injections XSS
            $name = is_array($_POST['animalName']) ? '' : htmlspecialchars(trim($_POST['animalName']), ENT_QUOTES, 'UTF-8');
            $gender = is_array($_POST['animalGender']) ? '' : htmlspecialchars($_POST['animalGender'], ENT_QUOTES, 'UTF-8');
            $number = is_array($_POST['animalNumber']) ? '' : htmlspecialchars(trim($_POST['animalNumber']), ENT_QUOTES, 'UTF-8');
            $country = is_array($_POST['animalCountry']) ? '' : htmlspecialchars(trim($_POST['animalCountry']), ENT_QUOTES, 'UTF-8');
            $birthDate = is_array($_POST['animalBirthDate']) ? '' : htmlspecialchars($_POST['animalBirthDate'], ENT_QUOTES, 'UTF-8');
            $arrivalDate = is_array($_POST['animalArrivalDate']) ? '' : htmlspecialchars($_POST['animalArrivalDate'], ENT_QUOTES, 'UTF-8');
            $species = $_POST['animalSpecies[]'];
            $description = is_array($_POST['animalDescription']) ? '' : htmlspecialchars(trim($_POST['animalDescription']), ENT_QUOTES, 'UTF-8');
            $imageUrl = is_array($_POST['animalImage']) ? '' : htmlspecialchars(trim($_POST['animalImage']), ENT_QUOTES, 'UTF-8');
            $cage = is_array($_POST['animalcage']) ? '' : htmlspecialchars(trim($_POST['animalcage']), ENT_QUOTES, 'UTF-8');
           
            var_dump($species);
            // Effectuez vos validations et traitements ici
            $errors = [];

            if ($name === '') {
                $errors[] = "Le nom ne peut pas être vide.";
            }
            if ($gender === '...') {
                $errors[] = "Veuillez sélectionner un genre.";
            }
            if (!preg_match('/^[\dA-Za-z]+$/', $number)) {
                $errors[] = "Le numéro doit contenir uniquement des chiffres et des lettres.";
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
            if (empty($species)) {
                $errors[] = "L'espèce ne peut pas être vide.";
            }
            if ($description === '') {
                $errors[] = "La description ne peut pas être vide.";
            }
            if (empty($imageUrl)) {
                $errors[] = "Veuillez entrer une URL d'image.";
            }
            if ($cage === '') {
                $errors[] = "Le champ 'Cage' ne peut pas être vide.";
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
$controller = new AnimalController();
$controller->ajouterAnimal();

?>
