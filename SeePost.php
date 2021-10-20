<?php

require_once('MakePost.php');
class SeePost {

    protected $row;
    protected $num_of_posts;
    protected $num_of_posts2;

    protected function sqlQuery($host, $db_user, $db_password, $db_name, $sql){
        //require('connectMysql.php');
    
        $conn = mysqli_connect($host,$db_user, $db_password, $db_name);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $result =mysqli_query($conn, $sql);
        $this->row = mysqli_fetch_assoc($result );
        $this->num_of_posts = mysqli_num_rows($result);
        $this->num_of_posts2 = $this->num_of_posts;;

        mysqli_close($conn);
        //header('Location: index.php');
    }  


    function __construct(){

        $sql = "SELECT * FROM posts0001"; 

        $this->sqlQuery("localhost","root", "","forum0001", $sql);
            while($this->num_of_posts2>0){
                echo "<br />".$this->row['content']."<br />";
                echo "Made by: ".$this->row['author']."<br />";
                echo "At: ".$this->row['data']."<br />";
                $this->num_of_posts2 = $this->num_of_posts2-1;
            }
        $this->num_of_posts2 = $this->num_of_posts;
    }

}