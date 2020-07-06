<?
class DB {
    private $conn;
    public $last_query=false;
    function __construct ($host='localhost',$user='root',$password='',$BD='kurs2'){
        $this->conn=mysqli_connect($host,$user,$password,$BD);
        if($err=mysqli_connect_error()){
            die('MySQL connection failure'.$err);
        }
    }

function __destruct()
{
    mysqli_close($this->conn);
    return true;
}

private function SQL($SQLString){
    $this->last_query = mysqli_query($this->conn,$SQLString);
    if($err = mysqli_error($this->conn)){
        die($err);
    }
    return $this->getResult();
}

private  function getResult(){
    if(gettype($this->last_query)!='boolean'){
        $resArr=array();
        while($res=mysqli_fetch_array($this->last_query))
        {
            $resArr[]=$res;
        }
        return $resArr;
    }else{
        return $this->last_query;
    }
}
function last_query(){
    return $this->getResult();
}

function getTableData($table,$name){
return $this->SQL("SELECT password from $table WHERE user='$name'");
}
function insertTableData($table,$data){
    $query="INSERT INTO $table SET ";
    foreach($data as $key=>$value){
        $queryArray[]="$key='$value'";
    }
    $query .= implode(',',$queryArray);
    return $this->SQL($query);
}
}
?>