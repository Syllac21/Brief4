<?php
// Définition des constantes pour la connexion à la base de données
const MYSQL_HOST = 'mysql_container'; 
const MYSQL_PORT = 3307; 
const MYSQL_NAME = 'db_refuge_animaux'; 
const MYSQL_USER = 'greta'; 
const MYSQL_PASSWORD = 'greta_refuge';
/**
 * Fonction permettant d'établir une connexion à la base de données
 * @return PDO Retourne un objet PDO représentant la connexion
 */
function dbConnect()
{
    // Vérifie le temps de session avant d'établir la connexion
    compareTime();
    try {
        // Création d'une instance PDO avec les paramètres définis précédemment
        $database = new PDO(
            'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_NAME . ';charset=utf8',
            MYSQL_USER,
            MYSQL_PASSWORD
        );

        // Configuration de PDO pour afficher les erreurs sous forme d'exception
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retourne l'objet PDO pour interagir avec la base de données
        return $database;
    } catch (Exception $exception) {
        // En cas d'erreur de connexion, on arrête l'exécution et on affiche le message d'erreur
        die('Erreur : ' . $exception->getMessage());
    }
}

/**
 * Fonction pour gérer le temps de session de l'utilisateur
 * Si l'utilisateur est inactif pendant plus de 15 minutes, il est déconnecté
 */
function compareTime()
{
    // Vérifie si une variable de session 'time' existe
    if (isset($_SESSION['time'])) {
        // Calcule le temps écoulé depuis la dernière action de l'utilisateur
        $deltaTime = time() - $_SESSION['time'];

        // Si le temps d'inactivité dépasse 15 minutes (900 secondes), on redirige vers la déconnexion
        if ($deltaTime > 15 * 60) {
            header('Location: /src/controller/controllerLogout.php');
            exit(); // Arrête l'exécution du script après la redirection
        } else {
            // Sinon, met à jour le temps de session avec l'heure actuelle
            $_SESSION['time'] = time();
        }
    }
}
