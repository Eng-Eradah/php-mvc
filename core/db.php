<?PHP

class DB{
    public $columns="";
    public $tables="";
    public $cond="";
    public $final_query="";
    private $connection;
    public $updateCond="";
    public $orderBy="";
    public $count="";
    public $groupBy="";
    public $join="";





    function __construct($server,$dbname,$username,$pass){

       // $dsn="mysql:host=".$server.";dbname=".$dbname;
       $dsn="mysql:host=localhost;dbname=shop";

        $this->connection=new PDO($dsn,"root","");

    }


    function select($cols){
        $this->columns="select ".implode(",",$cols)." ";


        return $this;

    }
    function from($tbls){

        $this->tables="from ".implode(",",$tbls)." ";
       
        return $this;

    }

    function orderBy($ordercol,$orderway){
        if(empty($this->cond))
        $this->orderBy="order by ".$ordercol." ".$orderway." ";
       else
       $this->orderBy.=",".$ordercol." ".$orderway." ";
       return $this;
    }
    function count($col){
        $this->count="Count(".$col.") " ;
        return $this;
    }
    function groupBy($ordercol,$orderway){
        if(empty($this->condation))
        $this->groupBy="GROUP by ".$ordercol." ".$orderway." ";
       else
       $this->groupBy.=",".$ordercol." ".$orderway." ";
       return $this;
    }
    function limit($offset=0,$maxno){
        $this->limit="limit ".$offset.",".$maxno." " ;
        return $this;
    }
    function innerjoin($table,$leftside,$rightside){
        $this->join.=" INNER JOIN ".$table." ON ".$leftside." = ".$rightside." ";
        return $this;
    }
    function outerjoin($table,$leftside,$rightside){
        $this->join.=" RIGHT JOIN ".$table." ON ".$leftside." = ".$rightside." ";
        return $this;
    }
    function leftjoin($table,$leftside,$rightside){
        $this->join.=" LEFT JOIN ".$table." ON ".$leftside." = ".$rightside." ";
        return $this;
    }
    function where($cond,$oprator,$value){
        

        if(empty($this->cond))

        $this->cond="where ".$cond." ".$oprator." ".$value." ";
        else
        $this->cond.=" and ".$cond." ".$oprator." ".$value." ";

        return $this;


    }
    function orWhere($cond,$oprator,$value){
        if(empty($this->cond))

        $this->cond="where ".$cond." ".$oprator." ".$value." ";
        else
        $this->cond.=" or ".$cond." ".$oprator." ".$value." ";

        return $this;
    }


    function build(){
        
        $this->final_query=$this->columns.$this->tables.$this->cond;
       
        return $this;
    }


    function exeucte(){
        $stmt=$this->connection->prepare($this->final_query);
        $stmt->execute();
       $result= $stmt->fetchAll(PDO::FETCH_OBJ);
       return $result;


    }


    function insert($tbl,$items){
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $values=array();
        foreach(array_values($items)as $item){
            $values[]="'".$item."'";
        }
       try{
        $this->final_query="insert into ".$tbl."(".implode(",",array_keys($items)).") values (".implode(",",$values).")";
        
        $stmt=$this->connection->prepare($this->final_query);
        $stmt->execute();
        echo $this->final_query;
       }catch(Exception $ex){
           
           echo $ex->getMessage();
       }
        return $this;

    }

    
    function delete($tbl){
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
       try{
        $this->final_query="delete from ".$tbl." ".$cond." ";
        
        $stmt=$this->connection->prepare($this->final_query);
        $stmt->execute();
        echo $this->final_query;
       }catch(Exception $ex){
           
           echo $ex->getMessage();
       }
        return $this;

    }

    function updateCond($cond,$oprator,$value){
        if(empty($this->cond))

        $this->updateCond="SET ".$cond." ".$oprator." ".$value." ";
        else
        $this->updateCond.=" , ".$cond." ".$oprator." ".$value." ";

        return $this;
    }
    function update($tbl,$items){
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
       try{
        $this->final_query="update  ".$tbl."  " . $this->updateCond." ".$cond." ";
        
        $stmt=$this->connection->prepare($this->final_query);
        $stmt->execute();
        echo $this->final_query;
       }catch(Exception $ex){
           
           echo $ex->getMessage();
       }
        return $this;

    }












}

?>