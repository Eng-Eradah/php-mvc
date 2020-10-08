<?PHP
class Route{

    function __construct($url){
        echo $url;
        $clean_url=rtrim($url,'/');
        echo $clean_url;
       //echo $clean_url.$length;

        $clean_url=explode('/',$clean_url);
        echo count($clean_url);


        $rquestedController=$clean_url[0]."Controller";

        include("app/controller/".$rquestedController.".php");
       // echo $clean_url[1];
       $user_url=isset($clean_url[1])?$clean_url[1]:"user";
      new $rquestedController($user_url);




    }



}
?>