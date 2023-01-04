
<?php
 require_once('C:\xampp\htdocs\QuizApp-backend\app\classes\crud.class.php');
//  require_once('C:\xampp\htdocs\QuizApp-backend\app\includes\scripts.php');

  $data=new Crud();
  $param=$data->Getdata('SELECT * FROM quiz');
  foreach($param as $params){
    $emparray[] = $params;
  }
  // we use this for using special charcters in database
  $json= json_encode($emparray,JSON_UNESCAPED_UNICODE);

  file_put_contents('data.json',$json);
  
  $quizAnswear=$data->Getdata('SELECT * FROM checkquiz');
  foreach($quizAnswear as $params){
    $empansweararray[] = $params;
  }
  $jsonansweras= json_encode($empansweararray,JSON_UNESCAPED_UNICODE);

  file_put_contents('answear-data.json',$jsonansweras);


 

  if(isset($_POST["login"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $myRows= $data-> fetchAllData("SELECT * FROM admins WHERE email=? AND password=?",array($email,$password));
    $numberRows = $data->getNumberOfRows("SELECT * FROM admins WHERE email=? AND password=?",array($email,$password));
     if($numberRows>0){
       foreach($myRows as $row);
       $_SESSION["name"]=$row['nom'];
     }else{
       echo '<b class="text-danger">this email not existe</b';
     }
  }
  
  // $quizAnswear=$data->Getdata('SELECT * FROM quiz');
    
  // if(isset($_POST["save-question"])){
  //   $question=$_POST["question"];
  //   $answear1=$_POST["answear1"];
  //   $answear2=$_POST["answear2"];
  //   $answear3=$_POST["answear3"];
  //   $answear4=$_POST["answear4"];
  //  $data->insertDataUser("INSERT INTO quiz VALUES(?,?,?,?,?)",array($question,$answear1,$answear2,$answear3,$answear4));
  // }



?>  