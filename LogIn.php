<?php

class LogIn {

    public $nick;
    public $password;
    protected $flag=true;
    protected $how_many_users;
    protected $row;

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
        $this->how_many_users=$result->num_rows;
        $this->row = $result -> fetch_assoc();

        mysqli_close($conn);
        //header('Location: index.php');
    }  

    function __construct($nick, $password){
        session_start();
        $_SESSION['whatAreYouDoing']="LogIn";
        $_SESSION['LogedIn']=false;
        $login = htmlentities($nick, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        $sql = "SELECT * FROM users0001 WHERE nick = '$nick'"; 
        $result = $this->sqlQuery("localhost","root", "","forum0001", $sql);

            if($this->how_many_users>0){
    
                if($this->row['pass']==$password){
                    $_SESSION['LogedIn']=true;
                    $_SESSION['LogedInNick']=$login;
    
                }
                else{
                    $_SESSION['E_L_pass']="Bad password";
                }
            }
            else{
                $_SESSION['E_L_nick']="Bad Nick";
            }
        header('Location: index.php');
    }
}