<?php


require_once 'config.php';

class Database{

    public $connection ;
    
    public $logged_user;


    function __construct(){

        $this->open_db_connection();
        $this->logged_in_user();

    }

    public function open_db_connection(){
         
           $this->connection = new mysqli("localhost", "root", "", "your_db");

           if($this->connection->connect_errno){

              die("connection failed".$this->connection->connect_error);
          }

    }

    public function query($sql){

        $result = $this->connection->query($sql);
        
        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result){
        if(!$result){
            die("Query failed".$this->connection->error);
        }
    }

    public function escape_string($string){

        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;

    }

    public function the_insert_id(){
        return $this->connection->insert_id;

    }

    public function logged_in_user(){
             if(isset($_SESSION['username'])){
                 $this->logged_user = $_SESSION['username'];
                  // $this->logged_user;
             }
    }
    
      
}

$database = new Database();

?>
