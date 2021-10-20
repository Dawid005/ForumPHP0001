<?php

session_start();

//$_SESSION['LogedIn']==false;

//unset($_SESSION['LogedInNick']);

session_destroy();

header('Location:index.php');