
<?php
include_once("model/Model.php");

class Controller {
 public $model;
 
 
 public function __construct()  
    {  
        $this->model = new Model();

    } 
	 public function invoke()
 {
  
  $reslt = $this->model->getlogin();     
  if($reslt == 'login')
  {
   include 'view/index.php';
  }
  else
  {
   include 'view/login.php';
  }
  
 }
 
 public function register()
 {
  
  $reslt = $this->model->getregsiter();     
  if($reslt == 'regsiter')
  {
   include 'view/index.php';
  }
  else
  {
   include 'view/register.php';
  }
  
 }
  public function restPass()
 {
  
  $reslt = $this->model->restPass();     
  if($reslt == 'rest')
  {
   include 'view/index.php';
  }
  else
  {
   include 'view/restPass.php';
  }
  
 }
   public function change()
 {
  
  $reslt = $this->model->change();     
  if($reslt == 'change')
  {
   include 'view/index.php';
  }
  else
  {
   include 'view/restPass.php';
  }
  
 }
 
}

?>
