<?php
include_once ('../database/DBConnect.php');
include_once('../database/Flash.php');
if (! empty($_POST['departmentName']) && ! empty($_POST['departmentDate'])){
    $facultyID = $_POST['facultyID'];
    $departmentName = $_POST['departmentName'];
    $departmentDate = $_POST['departmentDate'];
    mysqli_select_db($DBCONNECTION,$database);
    mysqli_query($DBCONNECTION,"INSERT INTO department (facultyid, departmentName, regdate) VALUES ('$facultyID', '$departmentName', '$departmentDate')");
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}