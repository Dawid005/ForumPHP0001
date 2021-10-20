<?php

class MakePost{

    private $author;
    private $content;
    private $data_and_time;

    protected function sqlQuery($host, $db_user, $db_password, $db_name, $sql){
        //require('connectMysql.php');
    
        $conn = mysqli_connect($host,$db_user, $db_password, $db_name);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $result =mysqli_query($conn, $sql);

        mysqli_close($conn);
        //header('Location: index.php');
    }  

    function __construct($author, $content){
        $content = htmlentities($content);

        $this->content = $content;
        $this->author = $author;
        $this->data_and_time =date("Y-m-d H:i:s");   ;

        $sql = "INSERT INTO posts0001 (author, content, data)
            VALUES('$this->author','$this->content', '$this->data_and_time')";
        $this->sqlQuery("localhost","root", "","forum0001", $sql);
    }

}