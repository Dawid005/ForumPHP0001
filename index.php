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

    <a href="SignUpObject.php" >Click here to sign up</a>

    <?php

        session_start();
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

        $_SESSION['whatAreYouDoing'] ="Nothing";
        unset($_SESSION['e_nick']);
        unset($_SESSION['e_pass']);
        
    ?>

</body>
</html>