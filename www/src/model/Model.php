<?php

// mes variables de connexion à ma BDD
const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3307;
const MYSQL_NAME = 'db_refuge_animaux';
const MYSQL_USER = 'greta';
const MYSQL_PASSWORD = 'password';

// ma fonction pour me connecter

function dbConnect()
{
    try{
        $database = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_NAME.';charset=utf8',
            MYSQL_USER, MYSQL_PASSWORD
        );
        return $database;
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $exception){
        die('Erreur : '.$exception->getMessage());
    }
}
