<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');
if ($_POST['TeacherName'] != null) {
    mysqli_select_db($DBCONNECTION, $database);
    $TeacherName = $_POST['TeacherName'];
    $year = date("Y");
    $attMonth = date("F");
    $attday = date("j");
    $attendance = $_POST['attendance'];
    mysqli_query($DBCONNECTION, "INSERT INTO teacherattr (teacherid, attYear, attMonth, attday, attr) VALUES ('$TeacherName', '$year', '$attMonth', '$attday', '$attendance')");
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}