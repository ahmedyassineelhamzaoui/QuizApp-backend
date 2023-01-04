<?php
require_once('C:\xampp\htdocs\QuizApp-backend\app\config\config.php');
class Database{
       private $host=DB_HOST;
       private $name=DB_NAME;
       private $user=DB_USER;
       private $password=DB_PASS;
       protected $dsn;
       public function __construct()
       {
        try{
           $this->dsn=new PDO('mysql:host='.$this->host.';dbname='.$this->name.';charset=utf8;port=3306',$this->user,$this->password);
        }catch(PDOException $e){
            echo 'erreur de connexion '.$e->getMessage();
        }
       }
}
?>