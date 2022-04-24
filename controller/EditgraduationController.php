<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if (! empty($_POST['dataID'])) {
    mysqli_select_db($DBCONNECTION, $database);
    $flash = new Flash();
    if (mysqli_query($DBCONNECTION,"SELECT graduation.studentid  FROM graduation WHERE graduation.studentid=". $_POST['student']) == true){
        $flash->setFlash("This student has graduated", "info");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }else{
        if (! empty($_POST['student'])) {
            $studente = $_POST['student'];
            mysqli_query($DBCONNECTION, "UPDATE graduation SET studentid = '$studente' WHERE id=" . $_POST['dataID']);
        }

        if (! empty($_POST['faculty'])) {
            $faculty = $_POST['faculty'];
            mysqli_query($DBCONNECTION, "UPDATE graduation SET facultyid = '$faculty' WHERE id=" . $_POST['dataID']);
        }

        if (! empty($_POST['GDepartment'])) {
            $GDepartment = $_POST['GDepartment'];
            mysqli_query($DBCONNECTION, "UPDATE graduation SET departmentid = '$GDepartment' WHERE id=" . $_POST['dataID']);
        }

        if (! empty($_POST['gDate'])) {
            $gDate = $_POST['gDate'];
            mysqli_query($DBCONNECTION, "UPDATE graduation SET graddate = '$gDate' WHERE id=" . $_POST['dataID']);
        }
        mysqli_error($DBCONNECTION);
        $flash->setFlash("Your information has been saved", "success");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}