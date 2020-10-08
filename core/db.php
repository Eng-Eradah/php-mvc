<?php
class DB{

    public $columns="";
    public $tables="";
    public $cond="";
    public $final_query="";
    private $connection="";
    public  $stmt="";
    public $colsHead="";
    public $cols="";
    public $DATABASE_HOST = 'localhost';
    public $DATABASE_USER = 'root';
    public $DATABASE_PASS = '';
    public $DATABASE_NAME = 'shop';
  
    function __constructor(){
       
      
            $this->connection= new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
       
            }
    function select($cols=['*']){
        $result=$cols=='*' ? $cols : implode(', ',$cols);
        $this->columns="select ". $result." ";

        return $this;

    }

    function from($tbls){
        $this->tables=" from ".implode(",",$tbls)." ";
        return $this;
        
    }

    function where($cond,$oprator,$value){
        if(empty($this->cond))
        $this->cond=" where  ".$cond." ".$oprator." ".$value;
        else
        $this->cond.=" and  ".$cond." ".$oprator." ".$value;
        return $this;
        
    }
    function orwhere($cond,$oprator,$value){
        if(empty($this->cond))
        $this->cond=" where  ".$cond." ".$oprator." ".$value;
        else
        $this->cond.=" or  ".$cond." ".$oprator." ".$value;
        return $this;
        
    }
    
    function bulid(){
        $this->final_query=$this->columns.$this->tables.$this->cond;
        return  $this;
    }
    function count($col){
        $this->count="Count(".$col.") " ;
        return $this;
    }
    function update(){
      
        $this->final_query="UPDATE ".$this->tables." SET  ".$this->columns.$this->cond;
        return $this;

    }
    
    function insert($tbla,$cols,$val){
        $this->colsHead=$cols;
        $this->final_query= "INSERT INTO ".$tbla." (".$cols.")"." VALUES (".$val.") ";
        return $this;
    }
    function delete(){
         $this->final_query= "DELETE FROM ".$this->tables." ".$this->cond;
         return $this;
      
    }
    function execute(){
        echo $this->final_query;
        $this->stmt = $this->connection->prepare($this->final_query);
           $this->stmt->execute();
        return $this;

    }
    function fetch(){
        $result= $this->stmt->fetchAll(PDO::FETCH_ASSOC);
          return  $this;
    }
}


?>