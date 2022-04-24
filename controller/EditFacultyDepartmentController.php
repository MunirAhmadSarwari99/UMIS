<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
$facultyID = $_POST['facultyID'];
$departmentID = $_POST['departmentID'];
if(! empty($facultyID) && ! empty($departmentID)){
    mysqli_select_db($DBCONNECTION, $database);
    $facultyName = $_POST['facultyName'];
    $facultyDate = $_POST['facultyDate'];

    mysqli_query($DBCONNECTION,"UPDATE faculty SET facultyName = '$facultyName', facultydate = '$facultyDate' WHERE id=" . $facultyID);

    $departmentName = $_POST['departmentName'];
    $departmentDate = $_POST['departmentDate'];

    mysqli_query($DBCONNECTION,"UPDATE department SET departmentName = '$departmentName', regdate = '$departmentDate' WHERE id=" . $departmentID);

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}