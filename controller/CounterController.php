<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$users = mysqli_query($DBCONNECTION,"SELECT COUNT(users.id) AS TotalUser FROM users");
$staff = mysqli_query($DBCONNECTION,"SELECT COUNT(staff.id) AS TotalStaff FROM staff");
$teacher = mysqli_query($DBCONNECTION,"SELECT COUNT(teacher.id) AS TotalTeacher FROM teacher");
$student= mysqli_query($DBCONNECTION,"SELECT COUNT(student.id) AS TotalStudent FROM student");