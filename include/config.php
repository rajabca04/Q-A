<?php
session_start();
class Work{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "q&a";

    private $connect;

    public function __construct(){
        $this-> connect = new mysqli($this->hostname,$this->username,$this->password, $this->database);
        if(mysqli_connect_error()){
            trigger_error("database connection failed");
        }
        else{
            return $this->connect;
        }
    }

    //insert data
    public function insertData($table,$fields){
        $col = implode(",",array_keys($fields));
        $rows = implode("','",array_values($fields));

        $sql = $this->connect->query("insert into $table ($col) value ('$rows')");

        if($sql){

            $_SESSION['alert'] = "data inserted successfully";
            $this -> redirect();
        }
        else{
            //fail
        }
    }

    public function alert($msg,$type="primary"){
        if(!empty($_SESSION['alert']) && $msg !=""){

        echo "<div class='alert alert-$type'> $msg </div>";

        unset($_SESSION['alert']);
        }

    }
    //calling data
    public function getData($query){

        $run = $this->connect->query($query);

        if($run->num_rows > 0){
            $array = [];
            while($row = $run->fetch_assoc()){
                $array[] = $row;
            }
            return $array;
        }
        else{
            echo "No record found";
        }
        
    }

    //count data
    public function countData($query){
        $go = $this->connect->query($query);
        return $go->num_rows;
    }

    public function redirect($page="index"){
        echo "<script>window.open('$page.php','_self')</script>";

    }


}
//object creation
$datawork = new Work();

?>