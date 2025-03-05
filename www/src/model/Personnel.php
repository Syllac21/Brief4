<?php
require_once 'Model.php';
class Personnel
{
    public function getAllPersonnel()
    {
       try{ 
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE IsArchived = 0;'); 
        $personnelStatement->execute();
        $personnels=$personnelStatement->fetchAll();

        return $personnels;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    
    }

    public function loginPersonnel($login, $password)
    {
        try{
        $pdo=dbConnect();
        $personnelStatement = $pdo->prepare('SELECT * FROM personnel WHERE login = :login AND mot_de_passe = :password AND IsArchived = 0');
        $personnelStatement->bindParam(':login', $login);
        $personnelStatement->bindParam(':password', $password);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    }

    public function getPersonnelById($id)
    {
        try{
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE id_personnel = :id');
        $personnelStatement->bindParam(':id', $id);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;}
        catch(Exception $exception){
            die('Erreur : '.$exception->getMessage());
        }
    }


 // Connect to the database
public function ajoutPersonnel($post)

{
    $pdo = dbConnect();

    try{
        $stmt = $pdo->prepare('
            INSERT INTO personnel(nom, prenom, poste, mot_de_passe, login)
            VALUES(:nom,:prenom,:poste,:password,:login)'
        );
        $stmt->bindParam(':nom',               $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom',            $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':poste',             $_POST['poste'], PDO::PARAM_STR);
        $stmt->bindParam(':password',          $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam(':login',             $_POST['login'], PDO::PARAM_STR);
        $stmt->execute();
        // $success = true;
        // echo "success";
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
            echo 'Erreur lors de l\'insertion: ' . $e->getMessage();
    }
}

public function archivePersonnel($id){
    $pdo = dbconnect();
    try {
        $stmt = $pdo->prepare('UPDATE personnel SET IsArchived = 1 WHERE id_personnel = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Lien avec le soigneur supprimé fghj" ;

    } catch (PDOException $e) {
        echo 'Erreur lors de l\'archivage: ' . $e->getMessage();
        return false;
    }
}


}