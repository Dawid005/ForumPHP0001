<?php

require_once('SeePost.php');
require_once('MakePost.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    $see = new SeePost();

    ?>


<form action method=post>

    <input type="text" name="content">
    <input type="submit" value="Make Post">

</form>


<?php

    if(isset($_POST['content'])){
        $make = new MakePost($_SESSION['LogedInNick'], $_POST['content']);
    }

    unset($_POST['content']);

?>

</body>
</html>l