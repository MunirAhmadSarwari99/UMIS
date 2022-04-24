<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_FILES['homework'])){
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];

    $homework = time().$_FILES['homework']['name'];
    $target3 = "../public/Storage/File/".$homework;
    move_uploaded_file($_FILES["homework"]["tmp_name"],$target3);

    mysqli_query($DBCONNECTION, "INSERT INTO homework (facultyid, departmentid, classid, subjectid, Homework) VALUES ('$faculty', '$department', '$class', '$subject', '$homework')");
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}