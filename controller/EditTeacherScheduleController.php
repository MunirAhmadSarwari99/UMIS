<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_POST['dataID'])){

    if (! empty($_POST['teacherName'])){
        $teacherName = $_POST['teacherName'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET teacherid = '$teacherName' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['faculty'])){
        $faculty = $_POST['faculty'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET facultyid = '$faculty' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['department'])){
        $department = $_POST['department'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET departmentid = '$department' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['class'])){
        $class = $_POST['class'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET classid = '$class' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['subject'])){
        $subject = $_POST['subject'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET subjectid = '$subject' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['day'])){
        $day = $_POST['day'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET day = '$day' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['StartTime'])){
        $StartTime = $_POST['StartTime'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET starttime = '$StartTime' WHERE id=" . $_POST['dataID']);
    }

    if (! empty($_POST['EndTime'])){
        $EndTime = $_POST['EndTime'];
        mysqli_query($DBCONNECTION,"UPDATE teacherschedule SET endtime = '$EndTime' WHERE id=" . $_POST['dataID']);
    }

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}