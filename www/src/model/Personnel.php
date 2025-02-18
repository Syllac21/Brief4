<?php
require_once 'Model.php';
class Personnel
{
    public function getAllPersonnel()
    {
       
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel');
        $personnelStatement->execute();
        $personnels=$personnelStatement->fetchAll();

        return $personnels;
    
    }

    public function loginPersonnel($login, $password)
    {
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE login = :login AND password = :password');
        $personnelStatement->bindParam(':login', $login);
        $personnelStatement->bindParam(':password', $password);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;
    }

    public function getPersonnelById($id)
    {
        $mysqlClient=dbConnect();
        $personnelStatement = $mysqlClient->prepare('SELECT * FROM personnel WHERE id = :id');
        $personnelStatement->bindParam(':id', $id);
        $personnelStatement->execute();
        $personnel=$personnelStatement->fetch();

        return $personnel;
    }
}