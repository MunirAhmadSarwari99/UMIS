<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_POST['StudentName']) &&  ! empty($_POST['faculty']) && ! empty($_POST['department']) && ! empty($_POST['class']) && ! empty($_POST['subject']) && ! empty($_POST['day']) && ! empty($_POST['StartTime']) && ! empty($_POST['EndTime'])){
    $StudentName = $_POST['StudentName'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $day = $_POST['day'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];

    mysqli_query($DBCONNECTION, "INSERT INTO studentschedule (studentid, facultyid, departmentid, classid, subjectid, day, starttime, endtime) VALUES ('$StudentName', '$faculty', '$department', '$class', '$subject', '$day', '$StartTime', '$EndTime')")or die(mysqli_error($DBCONNECTION));
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}