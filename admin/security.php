<?php
session_start();
include('database/dbconfig.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}

if(!$_SESSION['username']){
    header('Location: loginmain.php');
}

if($_SESSION['type'] == 3){
    header('Location: ../cashier/index.php');
}

if($_SESSION['student'] == 1){
    header('Location: ../student/index.php');
}
?>