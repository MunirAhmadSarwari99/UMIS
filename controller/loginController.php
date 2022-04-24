<?php
include_once ('../database/DBConnect.php');
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    mysqli_select_db($DBCONNECTION, $database);
    $result = mysqli_query($DBCONNECTION,"SELECT id, level, statue FROM users WHERE email ='$email' AND password ='$password'") or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);

        if ($row['level'] == 0 && $row['statue'] == 1){
            $_SESSION["loginSuccessID"] = $row['id'];
            $_SESSION["loginLevel"] = $row['level'];
            header("location:../views/Admin-Dashboard.php");
        }elseif ($row['level'] == 1 && $row['statue'] == 1){
            $_SESSION["loginSuccessID"] = $row['id'];
            $_SESSION["loginLevel"] = $row['level'];
            header("location:../views/dashboard.php");
        }elseif ($row['level'] == 2 && $row['statue'] == 1){
            $_SESSION["loginSuccessID"] = $row['id'];
            $_SESSION["loginLevel"] = $row['level'];
            header("location:../views/Teacher-Dashboard.php");
        }elseif ($row['level'] == 3 && $row['statue'] == 1){
            $_SESSION["loginSuccessID"] = $row['id'];
            $_SESSION["loginLevel"] = $row['level'];
            header("location:../views/Student-Dashboard.php");
        }else{
            header("location:../index.php?EmailOrPasswordFailed:Deactivate");
        }
}