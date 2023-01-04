<?php

require_once('C:\xampp\htdocs\QuizApp-backend\app\model\conexion.php');

class Crud extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function Getdata($query)
    {
      try{
        $statment=$this->dsn->prepare($query);
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
      }catch(Exception $e){
          echo 'Error '.$e->getMessage();
      }
     
    }
    public function insertDataUser($query,$parrams=[])
    {
       try{
        $statment=$this->dsn->prepare($query);
        $statment->execute($parrams);
       }catch(Exception $e){
        "Erreur se produit l'insertion des donnes ".$e->getMessage();
       }
    }
    public function getNumberOfRows($query,$parrams=[])
    {
       try{
        $statment=$this->dsn->prepare($query);
        $statment->execute($parrams);
        return $statment->rowCount();
       }catch(Exception $e){
           'erreur '.$e->getMessage();
       }
    }
    public function fetchAllData($query,$params=[])
    {
      try{
        $statment =$this->dsn->prepare($query);
        $statment->execute($params);
        return $statment->fetchAll(PDO::FETCH_ASSOC);

      }catch(Exception $e){
        'erreur '.$e->getMessage();
      }

    }
}


?>