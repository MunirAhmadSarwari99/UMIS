<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"
SELECT staffsalary.id, staffsalary.amount, staffsalary.salaryDate, staffsalary.bonus, staffsalary.Absences, staffsalary.pay, staff.firstName, staff.lastName
 FROM staffsalary
 INNER JOIN staff ON staff.id = staffsalary.staffid ORDER BY staffsalary.id ASC");

$query2 = mysqli_query($DBCONNECTION,"SELECT staff.id, staff.firstName, staff.lastName FROM staff");
$query3 = mysqli_query($DBCONNECTION,"SELECT staff.id, staff.firstName, staff.lastName FROM staff");