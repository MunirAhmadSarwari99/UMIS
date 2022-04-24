<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION,$database);
if (! empty($_POST['dataID'])){
    if (! empty($_POST['facultyName'])){
        $faculty = $_POST['facultyName'];
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET facultyid = '$faculty' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['student'])){
        $student = $_POST['student'];
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET studentid = '$student' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['amount'])){
        $amount = $_POST['amount'];
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET amount = '$amount' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['mounth'])){
        $mounth= $_POST['mounth'];
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET mounth = '$mounth' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['paydate'])){
        $date = $_POST['paydate'];
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET paydate = '$date' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['pay']) && $_POST['pay'] == 1){
        $pay = $_POST['pay'];
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET pay = '$pay' WHERE id=" . $_POST['dataID']);
    }else{
        $pay = 0;
        mysqli_query($DBCONNECTION,"UPDATE studentfees SET pay = '$pay' WHERE id=" . $_POST['dataID']);
    }
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}