<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
$dataID = $_POST['dataID'];
if(! empty($dataID)){
    mysqli_select_db($DBCONNECTION, $database);
    $staffName = $_POST['staffName'];
    $amount = $_POST['amount'];
    $salaryDate = $_POST['salaryDate'];
    $bonus = $_POST['bonus'];
    $absences = $_POST['absences'];
    $pay = $_POST['pay'];

    if (! empty($staffName) && ! empty($absences)){
        mysqli_query($DBCONNECTION,"UPDATE staffsalary SET staffid = '$staffName', amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', Absences = '$absences', pay = '$pay' WHERE id=" . $dataID);
    }
    if (! empty($staffName)){
        mysqli_query($DBCONNECTION,"UPDATE staffsalary SET staffid = '$staffName', amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', pay = '$pay' WHERE id=" . $dataID);
    }
    if (! empty($absences)){
        mysqli_query($DBCONNECTION,"UPDATE staffsalary SET amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', Absences = '$absences', pay = '$pay' WHERE id=" . $dataID);
    }
    mysqli_query($DBCONNECTION,"UPDATE staffsalary SET amount = '$amount', salaryDate = '$salaryDate', bonus = '$bonus', pay = '$pay' WHERE id=" . $dataID);

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}