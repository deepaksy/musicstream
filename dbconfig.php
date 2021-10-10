<?php
//error_reporting(0);
class database{ //variable for connecting to the databases
    public $dbhostname;
    public $dbusername;
    public $dbpassword;
    public $dbname;
    public $conn;

        //Constructor for defining the variable for database
        function __construct($hostname,$username,$password,$dbname){
            $this->dbhostname=$hostname;
            $this->dbusername=$username;
            $this->dbpassword=$password;
            $this->dbname=$dbname;
            $this->conn = mysqli_connect($this->dbhostname,$this->dbusername,$this->dbpassword,$this->dbname);
        }
        //Function for checking if the connection has been established or not
        function connectionCheck(){
            if($this->conn){
                echo "<script>console.log('Database Connection established!');</script>";
            }
            else{
                echo "<script>console.log('Error in connecting with the Database. please check the connection.');window.alert('Error connection with server!. reload or try again later..')</script>";
            }
        }
        //Function of query
        function query($query){
            $result = mysqli_query($this->conn,$query);
            if(!$result){
                echo "error";
            }
            return $result;
        }
    }

    $database  = new database('localhost','root','','musicstream'); //Class object created.
?>