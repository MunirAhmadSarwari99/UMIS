<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if (! empty($_POST['faculty']) && ! empty($_POST['department']) && ! empty($_POST['class']) && ! empty($_POST['teacher']) && ! empty($_POST['subject']) && ! empty($_POST['level']) && ! empty($_POST['chanse']) && ! empty($_POST['ExamDate'])) {
    mysqli_select_db($DBCONNECTION, $database);
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $class = $_POST['class'];
    $teacher = $_POST['teacher'];
    $subject = $_POST['subject'];
    $level = $_POST['level'];
    $chanse = $_POST['chanse'];
    $ExamDate = $_POST['ExamDate'];
    mysqli_query($DBCONNECTION,"INSERT INTO onlineExam (facultyid,  departmentid, teacherid, classid, subjectid, examlevel, examChanse, examyDate) VALUES ('$faculty', '$department', '$teacher', '$class', '$subject', '$level', '$chanse', '$ExamDate')");
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}