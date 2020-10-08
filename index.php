
<?php 
 /*include_once("app/controller/Controller.php");

 $controller = new Controller();
 $url=isset($_GET['url'])?$_GET['url']:"index";
  $clean_url=rtrim($url,'/');
        $clean_url=explode('/',$clean_url);
      
		if($clean_url[1]=="chang")
		{
			$controller->change();
		}
		else if($clean_url[1]=="register")
		{
			$controller->register();
		}
		else if($clean_url[1]=="restPass")
		{
			$controller->restPass();
		}
		else if($clean_url[1]=="login"){
			$controller->invoke();
		}
		else{
			$controller->index();
		}*/

		include("core/route.php");
		include("core/controller.php");
		//include("core/db.php");
		//include("core/session.php");
		include("core/view.php");
		include("core/model.php");
		$url=isset($_GET['url'])?$_GET['url']:"user";
		new Route($url);
		?>
