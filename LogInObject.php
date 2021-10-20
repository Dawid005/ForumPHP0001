<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action method=post>

        <input type="text" name="nick">
        <input type="text" name="pass">
        <input type="submit" value="Sign Up">

    </form>
    <?php
        if(isset($_POST['nick']) && isset($_POST['pass'])){
            $nick = $_POST['nick'];
            $pass = $_POST['pass'];

            require_once('LogIn.php');

            $Login = new LogIn($nick, $pass);
        }

    ?>
</body>
</html>