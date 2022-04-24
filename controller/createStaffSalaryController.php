<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if ($_POST['staffName'] != null){
    if ($_POST['bonus'] < 501){
        mysqli_select_db($DBCONNECTION,$database);
        $staffName = $_POST['staffName'];
        $amount = $_POST['amount'];
        $salaryDate = $_POST['salaryDate'];
        $bonus = $_POST['bonus'];
        $absences = $_POST['absences'];
        $pay = $_POST['pay'];
        mysqli_query($DBCONNECTION,"INSERT INTO staffsalary (staffid, amount, salaryDate, bonus, Absences, pay) VALUES ('$staffName', '$amount', '$salaryDate', '$bonus', '$absences', '$pay')");
    }
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}