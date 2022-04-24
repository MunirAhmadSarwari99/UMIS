<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT studentfees.id, faculty.facultyName, student.SfirstName, student.SlastName, studentfees.amount, studentfees.mounth, studentfees.paydate, studentfees.pay FROM studentfees INNER JOIN faculty ON faculty.id = studentfees.facultyid INNER JOIN student ON student.id = studentfees.studentid ORDER BY studentfees.id ASC");
$query2 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty");
$query3 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student");
$query4 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student");
$query5 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty");