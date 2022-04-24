<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if (! empty($_POST['student']) && ! empty($_POST['faculty']) && ! empty($_POST['GDepartment']) && ! empty($_POST['gDate'])) {
    $flash = new Flash();
    mysqli_select_db($DBCONNECTION, $database);
    $row = mysqli_query($DBCONNECTION,"SELECT graduation.studentid  FROM graduation WHERE graduation.studentid=". $_POST['student']);
    if (mysqli_num_rows($row) > 0){
        $flash->setFlash("This student has graduated", "info");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }else{
        $studente = $_POST['student'];
        $faculty = $_POST['faculty'];
        $GDepartment = $_POST['GDepartment'];
        $gDate = $_POST['gDate'];
        mysqli_query($DBCONNECTION,"INSERT INTO graduation (studentid, facultyid,  departmentid, graddate) VALUES ('$studente', '$faculty', '$GDepartment', '$gDate')");
        mysqli_error($DBCONNECTION);
        $flash->setFlash("Your information has been saved", "success");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}