<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
$dataID = $_POST['dataID'];
if(! empty($dataID)){
    mysqli_select_db($DBCONNECTION, $database);
    $teacherNames = $_POST['teacherNames'];
    $amount = $_POST['amount'];
    $salaryDate = $_POST['salaryDate'];
    $bonus = $_POST['bonus'];
    $absences = $_POST['absences'];
    $pay = $_POST['pay'];

    if (! empty($teacherNames) && ! empty($absences)){
        mysqli_query($DBCONNECTION,"UPDATE teachersalary SET teacherid = '$teacherNames', amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', Absences = '$absences', pay = '$pay' WHERE id=" . $dataID);
    }
    if (! empty($teacherNames)){
        mysqli_query($DBCONNECTION,"UPDATE teachersalary SET teacherid = '$teacherNames', amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', pay = '$pay' WHERE id=" . $dataID);
    }
    if (! empty($absences)){
        mysqli_query($DBCONNECTION,"UPDATE teachersalary SET amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', Absences = '$absences', pay = '$pay' WHERE id=" . $dataID);
    }
    mysqli_query($DBCONNECTION,"UPDATE teachersalary SET amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', pay = '$pay' WHERE id=" . $dataID);

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}