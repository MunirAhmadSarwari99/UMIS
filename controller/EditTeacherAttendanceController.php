<?php
include_once ('../database/DBConnect.php');
include_once('../database/Flash.php');
$dataID = $_POST['dataID'];
if(! empty($dataID)){
    mysqli_select_db($DBCONNECTION, $database);
    $TeacherName = $_POST['TeacherName'];
    $year = $_POST['year'];
    $attMonth = $_POST['attMonth'];
    $attday = $_POST['attday'];
    $attendance = $_POST['attendance'];

    if (! empty($TeacherName) && $TeacherName != null){
        mysqli_query($DBCONNECTION,"UPDATE teacherattr SET teacherid = '$TeacherName' WHERE id=" . $dataID);
    }
    if (! empty($attMonth)  && $attMonth != null){
        mysqli_query($DBCONNECTION,"UPDATE teacherattr SET attMonth = '$attMonth' WHERE id=" . $dataID);
    }
    if (! empty($attday) && $attday != null){
        mysqli_query($DBCONNECTION,"UPDATE teacherattr SET attday = '$attday' WHERE id=" . $dataID);
    }
    mysqli_query($DBCONNECTION,"UPDATE teacherattr SET attYear = '$year', attr = '$attendance' WHERE id=" . $dataID);

    mysqli_error($DBCONNECTION);

    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}