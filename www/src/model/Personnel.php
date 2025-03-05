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
    $password=password_hash(trim(strip_tags($post['password'])), PASSWORD_DEFAULT);
    try{
        $stmt = $pdo->prepare('
            INSERT INTO personnel(nom, prenom, poste, mot_de_passe, login)
            VALUES(:nom,:prenom,:poste,:password,:login)'
        );
        $stmt->bindParam(':nom',               $post['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom',            $post['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':poste',             $post['poste'], PDO::PARAM_STR);
        $stmt->bindParam(':password',          $password, PDO::PARAM_STR);
        $stmt->bindParam(':login',             $post['login'], PDO::PARAM_STR);
        $stmt->execute();
        // $success = true;
        // echo "success";
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
            echo 'Erreur lors de l\'insertion: ' . $e->getMessage();
    }
}

/**
 * Archive a personnel
 * @param int $id
 * @return bool
 */

public function archivePersonnel($id){
    $pdo = dbconnect();
    try {
        $stmt = $pdo->prepare('UPDATE personnel SET IsArchived = 1 WHERE id_personnel = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        // echo "Lien avec le soigneur supprimé fghj" ;

    } catch (PDOException $e) {
        echo 'Erreur lors de l\'archivage: ' . $e->getMessage();
        return false;
    }
}

/**
 * Update a personnel
 * @param array $postdata
 * @return bool
 */
public function updatePersonnel($postdata){
    $pdo = dbconnect();
    try {
        $stmt = $pdo->prepare('UPDATE personnel SET nom = :nom, prenom = :prenom, poste = :poste, login = :login WHERE id_personnel = :id');
        $stmt->bindParam(':id', $postdata['id_personnel'], PDO::PARAM_INT);
        $stmt->bindParam(':nom', $postdata['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $postdata['prenom'], PDO::PARAM_STR);
        $stmt->bindParam(':poste', $postdata['poste'], PDO::PARAM_STR);
        $stmt->bindParam(':login', $postdata['login'], PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

}