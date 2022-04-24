<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');
if ($_POST['StudentName'] != null) {
    mysqli_select_db($DBCONNECTION, $database);
    $StudentName = $_POST['StudentName'];
    $year = date("Y");
    $attMonth = date("F");
    $attday = date("j");
    $attendance = $_POST['attendance'];
    mysqli_query($DBCONNECTION, "INSERT INTO studentatt (studentid, attYear, attMonth, attday, attr) VALUES ('$StudentName', '$year', '$attMonth', '$attday', '$attendance')");
//    $flash = new Flash();
//    $flash->setFlash("Your information has been saved", "success");
//    header("Location: " . $_SERVER["HTTP_REFERER"]);
}