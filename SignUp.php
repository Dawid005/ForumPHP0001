<?php

class SignUp {

    public $nick;
    public $password;
    protected $flag= true;
    protected $how_many_nicks=10;

    public function GetInfoAboutFlag(){
        $flagInfo=$this->flag;
        return $flagInfo;
    }

    protected function sqlQuery($host, $db_user, $db_password, $db_name, $sql){
        //require('connectMysql.php');
    
        $conn = mysqli_connect($host,$db_user, $db_password, $db_name);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $result =mysqli_query($conn, $sql);
    
        $this->how_many_nicks=$result->num_rows;
        mysqli_close($conn);
        //header('Location: index.php');
    }  

    function __construct($nick, $password){

        session_start();
        if(strlen($nick)<3 || strlen($nick)>15){
            $this->flag = false;
            $_SESSION['e_nick']="Nick must be from 3 to 15 signs.";
        }

        if (!ctype_alnum($nick)){
            $this->flag = false;
            $_SESSION['e_nick']="Nick must only contains letters or digits.";
        }

        if(strlen($password)<3 || strlen($password)>15){
            $this->flag = false;
            $_SESSION['e_pass']="Password must be from 3 to 15 signs.";
        }

        if (!ctype_alnum($password)){
            $this->flag = false;
            $_SESSION['e_pass']="Nick must only contains letters or digits.";
        }

        $sql = "SELECT * FROM users0001 WHERE nick = '$nick'"; 
        $result = $this->sqlQuery("localhost","root", "","forum0001", $sql);

        if($this->how_many_nicks>0)
                {
                    $this->flag = false;
                    $_SESSION['e_nick'] = "There is already account with this nick";
                }

        if($this->flag){

            $sql = "INSERT INTO users0001 (nick, pass)
            VALUES('$nick','$password' )";
            $this->sqlQuery("localhost","root", "","forum0001", $sql);
            $this->nick = $nick;
            $this->password = $password;
            unset( $_SESSION['e_nick']);
            unset( $_SESSION['e_pass']);
            $_SESSION['okSingUp']="You created account successfully";
        }
        $_SESSION['whatAreYouDoing']="SignUp";
        header('Location: index.php');
    }

}