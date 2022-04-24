<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_POST['className']) && ! empty($_POST['classID'])){
    $id = $_POST['classID'];
    $className = $_POST['className'];

    if (! empty($_POST['faculty'])){
        $faculty = $_POST['faculty'];
        mysqli_query($DBCONNECTION,"UPDATE class SET facultyid = '$faculty' WHERE id=" . $id);
    }
    if (! empty($_POST['department'])){
        $department = $_POST['department'];
        mysqli_query($DBCONNECTION,"UPDATE class SET departmentid = '$department' WHERE id=" . $id);
    }

    if (! empty($_POST['semester'])){
        $semester = $_POST['semester'];
        mysqli_query($DBCONNECTION,"UPDATE class SET semester = '$semester' WHERE id=" . $id);
    }

    mysqli_query($DBCONNECTION,"UPDATE class SET className = '$className' WHERE id=" . $id);

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}