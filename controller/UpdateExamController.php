<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');

if (! empty($_POST['examID'])) {
    mysqli_select_db($DBCONNECTION, $database);

    if (! empty($_POST['faculty'])){
        $faculty = $_POST['faculty'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET facultyid = '$faculty' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['department'])){
        $department = $_POST['department'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET departmentid = '$department' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['class'])){
        $class = $_POST['class'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET classid = '$class' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['teacher'])){
        $teacher = $_POST['teacher'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET teacherid = '$teacher' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['subject'])){
        $subject = $_POST['subject'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET subjectid = '$subject' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['level'])){
        $level = $_POST['level'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET examlevel = '$level' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['chanse'])){
        $chanse = $_POST['chanse'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET examChanse = '$chanse' WHERE id=" . $_POST['examID']);
    }

    if (! empty($_POST['ExamDate'])){
        $ExamDate = $_POST['ExamDate'];
        mysqli_query($DBCONNECTION, "UPDATE onlineexam SET examyDate = '$ExamDate' WHERE id=" . $_POST['examID']);
    }

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . "../views/exam.php");
}