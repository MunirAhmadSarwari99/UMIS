<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT studentatt.id, student.SfirstName, student.SlastName,  studentatt.attYear,  studentatt.attMonth,  studentatt.attday,  studentatt.attr FROM studentatt INNER JOIN student ON student.id = studentatt.studentid ORDER BY studentatt.id ASC");

$query2 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student");
$query3 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student");

$pr = mysqli_query($DBCONNECTION,"SELECT COUNT(studentatt.attr) as total1 FROM studentatt WHERE studentatt.attr = 1");
$ap = mysqli_query($DBCONNECTION,"SELECT COUNT(studentatt.attr) as total2 FROM studentatt WHERE studentatt.attr = 0");
$allStudents = mysqli_query($DBCONNECTION,"SELECT COUNT(student.id) as AllStudent FROM student");

$Present = mysqli_fetch_assoc($pr);
$Absences = mysqli_fetch_assoc($ap);
$allStudent = mysqli_fetch_assoc($allStudents);
