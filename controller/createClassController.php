<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_POST['className'])){
    $className = $_POST['className'];
    $semester = $_POST['semester'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];

    mysqli_query($DBCONNECTION, "INSERT INTO class (facultyid, departmentid, className, semester) VALUES ('$faculty', '$department', '$className', '$semester')");
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}