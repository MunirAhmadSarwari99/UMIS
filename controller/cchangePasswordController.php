<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
session_start();
if(isset($_POST['oldPassword']) && isset($_POST['newPassword'])){
    mysqli_select_db($DBCONNECTION, $database);
    $query = mysqli_query($DBCONNECTION, 'SELECT password FROM users WHERE id='. $_SESSION["loginSuccessID"]) or die(mysqli_error());
    $result = mysqli_fetch_assoc($query);
    $flash = new Flash();
    if ($result['password'] == $_POST['oldPassword']){
        $newPassword = $_POST['newPassword'];
        mysqli_query($DBCONNECTION,"UPDATE users SET`password`='$newPassword' WHERE id=" .$_SESSION["loginSuccessID"]. "") or die(mysqli_error());
        $flash->setFlash("Your Password Has Been Changed", "success");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }else{
        $flash->setFlash("Your Password Did Not Change", "warning");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}else{
    $flash->setFlash("Enter Old Password and New Password", "info");
}