<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION,$database);
if (! empty($_POST['facultyName']) && ! empty($_POST['student']) && ! empty($_POST['amount']) && ! empty($_POST['mounth']) && ! empty($_POST['paydate'])){
    $faculty = $_POST['facultyName'];
    $student = $_POST['student'];
    $amount = $_POST['amount'];
    $mounth= $_POST['mounth'];
    $date = $_POST['paydate'];
    $pay = $_POST['pay'];
    mysqli_query($DBCONNECTION,"INSERT INTO studentfees (facultyid, studentid, amount, mounth, paydate, pay) VALUES ('$faculty', '$student', '$amount', '$mounth', '$date','$pay')") or die(mysqli_error($DBCONNECTION));
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}