<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT staffattendance.id, staff.firstName, staff.lastName, staffattendance.attYear, staffattendance.attMonth, staffattendance.attday, staffattendance.attr FROM staffattendance INNER JOIN staff ON staff.id = staffattendance.staffid ORDER BY staffattendance.id ASC");

$query2 = mysqli_query($DBCONNECTION,"SELECT staff.id, staff.firstName, staff.lastName FROM staff");
$query3 = mysqli_query($DBCONNECTION,"SELECT staff.id, staff.firstName, staff.lastName FROM staff");

$pr = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total1 FROM staffattendance WHERE staffattendance.attr = 1");
$ap = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total2 FROM staffattendance WHERE staffattendance.attr = 0");
$si = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total3 FROM staffattendance WHERE staffattendance.attr = 2");
$ne = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total4 FROM staffattendance WHERE staffattendance.attr = 3");

$Present = mysqli_fetch_assoc($pr);
$Absences = mysqli_fetch_assoc($ap);
$Sick = mysqli_fetch_assoc($si);
$Necessary = mysqli_fetch_assoc($ne);