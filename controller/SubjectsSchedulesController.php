<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query1 = mysqli_query($DBCONNECTION,"SELECT * FROM subject ORDER BY id ASC");
$query2 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher ORDER BY teacher.id ASC");
$query3 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query4 = mysqli_query($DBCONNECTION,"SELECT subject.id, subject.subname FROM subject ORDER BY subject.id ASC");
$query5 = mysqli_query($DBCONNECTION,"SELECT teacherschedule.id, teacherschedule.day,  teacherschedule.starttime, 
teacherschedule.endtime, teacher.firstName, teacher.lastName, faculty.facultyName, department.departmentName, class.className, subject.subname 
FROM teacherschedule 
INNER JOIN teacher ON teacher.id = teacherschedule.teacherid 
INNER JOIN faculty ON faculty.id = teacherschedule.facultyid 
INNER JOIN department ON department.id = teacherschedule.departmentid 
INNER JOIN class ON class.id = teacherschedule.classid 
INNER JOIN subject ON subject.id = teacherschedule.subjectid ORDER BY teacherschedule.id ASC");

$query7 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher ORDER BY teacher.id ASC");
$query8 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query9 = mysqli_query($DBCONNECTION,"SELECT subject.id, subject.subname FROM subject ORDER BY subject.id ASC");

//======================= Student Schedule =======================

$query10 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student ORDER BY student.id ASC");
$query11 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query12 = mysqli_query($DBCONNECTION,"SELECT subject.id, subject.subname FROM subject ORDER BY subject.id ASC");
$query13 = mysqli_query($DBCONNECTION,"SELECT studentschedule.id, studentschedule.day,  studentschedule.starttime, 
studentschedule.endtime, student.SfirstName, student.SlastName, faculty.facultyName, department.departmentName, class.className, subject.subname 
FROM studentschedule 
INNER JOIN student ON student.id = studentschedule.studentid 
INNER JOIN faculty ON faculty.id = studentschedule.facultyid 
INNER JOIN department ON department.id = studentschedule.departmentid 
INNER JOIN class ON class.id = studentschedule.classid 
INNER JOIN subject ON subject.id = studentschedule.subjectid ORDER BY studentschedule.id ASC");

$query14 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student ORDER BY student.id ASC");
$query15 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query16 = mysqli_query($DBCONNECTION,"SELECT subject.id, subject.subname FROM subject ORDER BY subject.id ASC");
