<?php
session_start();
$_SESSTION["loginSuccessID"] ="";
unset($_SESSTION["loginSuccessID"]);
session_destroy();
if(isset($_SESSTION["loginSuccessID"])){
    echo "Try Again";
}else{
    header("location:../index.php");
}