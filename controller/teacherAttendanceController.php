<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT teacherattr.id, teacher.firstName, teacher.lastName,  teacherattr.attYear,  teacherattr.attMonth,  teacherattr.attday,  teacherattr.attr FROM teacherattr INNER JOIN teacher ON teacher.id = teacherattr.teacherid ORDER BY teacherattr.id ASC");

$query2 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher");
$query3 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher");

$pr = mysqli_query($DBCONNECTION,"SELECT COUNT(teacherattr.attr) as total1 FROM teacherattr WHERE teacherattr.attr = 1");
$ap = mysqli_query($DBCONNECTION,"SELECT COUNT(teacherattr.attr) as total2 FROM teacherattr WHERE teacherattr.attr = 0");
$allTeachers = mysqli_query($DBCONNECTION,"SELECT COUNT(teacher.id) as AllTeacher FROM teacher");

$Present = mysqli_fetch_assoc($pr);
$Absences = mysqli_fetch_assoc($ap);
$allTeacher = mysqli_fetch_assoc($allTeachers);