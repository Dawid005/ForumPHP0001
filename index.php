<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1> welcome on our forum </h1>

    <?php
        session_start();
        if(!isset($_SESSION['LogedIn']) ){
    ?>
        <a href="SignUpObject.php" >Click here to sign up</a>
    
        <br />
    
        <a href="LogInObject.php" > Click here to Log In </a>
    <?php
        }
    

        if(isset($_SESSION['whatAreYouDoing'])){
            if($_SESSION['whatAreYouDoing'] == "SignUp")
            {
                if(isset($_SESSION['e_nick'])){
                    echo "<br />".$_SESSION['e_nick']."<br />";
                }

                if(isset($_SESSION['e_pass'])){
                    echo "<br />".$_SESSION['e_pass']."<br />";
                }
                if(isset($_SESSION['okSingUp'])){
                    echo "<br />".$_SESSION['okSingUp']."<br />";
                }
            }

            if($_SESSION['whatAreYouDoing'] == "LogIn"){
                if(isset($_SESSION['E_L_pass'])){
                    echo "<br />".$_SESSION['E_L_pass']."<br />";
                }

                if(isset($_SESSION['E_L_nick'])){
                    echo "<br />".$_SESSION['E_L_nick']."<br />";
                }
            }

            if(isset($_SESSION['LogedIn']) ){
                if($_SESSION['LogedIn']==true){
                    
                    ?>

                        <a href="LogOut.php">Click here to Log out</a> 

                        <br />

                        <a href = "PostObject.php">Click here to talk with people </a>
                   
                   
                   <?php
                        echo "<br />"."You are loged in as: ".$_SESSION['LogedInNick']."<br />";

                }
            }
        }
        $_SESSION['whatAreYouDoing'] ="Nothing";
        unset($_SESSION['e_nick']);
        unset($_SESSION['e_pass']);
        unset($_SESSION['E_L_nick']);
        unset($_SESSION['E_L_pass']);
        
    ?>

</body>
</html>