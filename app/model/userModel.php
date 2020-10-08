
<?php

include_once("app/model/userModel.php");

class userModel extends Model {

 public function getlogin()
 {
	   $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'shop';
   
   $pdo= new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
   
  
  // here goes some hardcoded values to simulate the database
  if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
    $stmt = $pdo->prepare('SELECT * FROM user where user_name=? and password=?');
            $stmt->execute([$_REQUEST['username'],$_REQUEST['password']]);
            $count = $stmt->rowCount(); 
   if($count>0){
    return 'login';
   }
    else{
    return 'invalid user';
   }
  }
 }
 public function getregsiter()
 {
	 $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'shop';
   
   $pdo= new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
   
  
    
  
  // here goes some hardcoded values to simulate the database
 if ( !empty($_POST['name']) &&!empty($_POST['email']) && !empty($_POST['password']) ) {
           
           $id=null;
            $stmt = $pdo->prepare('INSERT INTO user VALUES (?, ?, ?, ?)');
          
            $stmt->execute([null,$_REQUEST['name'],$_REQUEST['email'],$_REQUEST['password']]);
            $count = $stmt->rowCount(); 
   if($count>0){
    return 'regsiter';
   }
                        else{
    return 'invalid user';
   }
  }
 }
 
 
 
  public function change()
 {
	 $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'shop';
   
   $pdo= new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
   
  
    
  
  // here goes some hardcoded values to simulate the database
 if ( !empty($_POST['email']) && !empty($_POST['password'])&& !empty($_POST['password2']) ) {
           
            $stmt = $pdo->prepare('UPDATE user SET  password = ? WHERE user_email = ? and password=? ');          
            $stmt->execute([$_POST['password2'],$_REQUEST['email'],$_REQUEST['password']]);
            $count = $stmt->rowCount(); 
   if($count>0){
    return 'change';
   }
       else{
    return 'invalid user';
   }
  }
 }
  public function restPass()
 {
	 $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'shop';
   
   $pdo= new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
   
  
    
  
  // here goes some hardcoded values to simulate the database
 if ( !empty($_POST['email']) && !empty($_POST['password']) ) {
           
            $stmt = $pdo->prepare('UPDATE user SET  password = ? WHERE user_email = ? ');          
            $stmt->execute([$_REQUEST['password'],$_REQUEST['email']]);
            $count = $stmt->rowCount(); 
   if($count>0){
    return 'rest';
   }
       else{
    return 'invalid user';
   }
  }
 }
 
}

?>
