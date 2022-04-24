<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');
if ($_POST['teacherName'] != null) {
    mysqli_select_db($DBCONNECTION, $database);
    $teacherName = $_POST['teacherName'];
    $amount = $_POST['amount'];
    $salaryDate = $_POST['salaryDate'];
    $bonus = $_POST['bonus'];
    $absences = $_POST['absences'];
    $pay = $_POST['pay'];
    mysqli_query($DBCONNECTION, "INSERT INTO teachersalary (teacherid, amount, salaryDate, bonus, Absences, pay) VALUES ('$teacherName', '$amount', '$salaryDate', '$bonus', '$absences', '$pay')");
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}