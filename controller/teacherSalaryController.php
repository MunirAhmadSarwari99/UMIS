<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"
SELECT teachersalary.id, teachersalary.amount, teachersalary.salaryDate, teachersalary.bonus, teachersalary.Absences, teachersalary.pay, teacher.firstName, teacher.lastName
 FROM teachersalary
 INNER JOIN teacher ON teacher.id = teachersalary.teacherid ORDER BY teachersalary.id ASC");

$query2 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher");
$query3 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher");