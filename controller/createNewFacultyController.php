<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if (! empty($_POST['facultyName']) && ! empty($_POST['facultyDate'])){
    $facultyName = $_POST['facultyName'];
    $facultyDate = $_POST['facultyDate'];
    mysqli_select_db($DBCONNECTION,$database);
    mysqli_query($DBCONNECTION,"INSERT INTO faculty (facultyName, facultydate) VALUES ('$facultyName', '$facultyDate')");
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location:../views/faculty.php");
}