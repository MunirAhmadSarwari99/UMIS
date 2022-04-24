<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');
if ($_POST['staffName'] != null && $_POST['year'] != null && $_POST['attMonth'] != null && $_POST['attday'] != null && $_POST['attendance'] != null) {
    mysqli_select_db($DBCONNECTION, $database);
    $staffName = $_POST['staffName'];
    $year = date("Y");
    $attMonth = date("F");
    $attday = date("j");
    $attendance = $_POST['attendance'];
    mysqli_query($DBCONNECTION, "INSERT INTO  staffattendance (staffid, attYear, attMonth, attday, attr) VALUES ('$staffName', '$year', '$attMonth', '$attday', '$attendance')");
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}