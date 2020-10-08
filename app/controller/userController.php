
<?php
include_once("app/model/userModel.php");

class userController extends Controller {
 
    public $controller;
    public $model;
	public function __construct($fun='index')
	{
        $this->controller=new Controller();
        $this->model=$this->controller->model_object->create_model('user');
        $this->$fun();
       
    }
  

    public function index()
    {
    
      include 'app/view/user.php';     
    }
    
	 public function login()
 {
  
  $reslt = $this->model->getlogin();     
  if($reslt == 'login')
  {
   include 'app/view/user.php';
  }
  else
  {
   include 'app/view/login.php';
  }
  
 }
 
 public function register()
 {
  
  $reslt = $this->model->getregsiter();     
  if($reslt == 'regsiter')
  {
   include 'app/view/user.php';
  }
  else
  {
   include 'app/view/register.php';
  }
  
 }
  public function restPass()
 {
  
  $reslt = $this->model->restPass();     
  if($reslt == 'rest')
  {
   include 'app/view/user.php';
  }
  else
  {
   include 'app/view/restPass.php';
  }
  
 }
   public function change()
 {
  
  $reslt = $this->model->change();     
  if($reslt == 'change')
  {
   include 'app/view/user.php';
  }
  else
  {
   include 'app/view/restPass.php';
  }
  
 }
 
}

?>
