<?php

// mes variables de connexion à ma BDD
const MYSQL_HOST = 'mysql_container';
const MYSQL_PORT = 3307;
const MYSQL_NAME = 'db_refuge_animaux';
const MYSQL_USER = 'greta';
const MYSQL_PASSWORD = 'greta_refuge';

// ma fonction pour me connecter

function dbConnect()
{
    compareTime();
    try{
        $database = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_NAME.';charset=utf8',
            MYSQL_USER, MYSQL_PASSWORD
        );
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $database;
    } catch(Exception $exception){
        die('Erreur : '.$exception->getMessage());
    }
}

function compareTime(){
    if(isset($_SESSION['time'])){
        $deltaTime = time() - $_SESSION['time'];
        if($deltaTime > 15*60){
            header('Location: /src/controller/controllerLogout.php');
        } else {
            $_SESSION['time'] = time();
        }   
    }
}
