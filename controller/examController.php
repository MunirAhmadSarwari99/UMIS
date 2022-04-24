<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query2 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query3 = mysqli_query($DBCONNECTION,"SELECT teacher.id, teacher.firstName, teacher.lastName FROM teacher ORDER BY teacher.id ASC");
$query4 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student ORDER BY student.id ASC");
$query5 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query6 = mysqli_query($DBCONNECTION,"SELECT subject.id, subject.subname FROM subject ORDER BY subject.id ASC");
$query7 = mysqli_query($DBCONNECTION,"SELECT onlineexam.id, faculty.facultyName, department.departmentName, class.className, subject.subname, teacher.firstname, teacher.lastname, onlineexam.examlevel, onlineexam.examChanse, onlineexam.examyDate FROM onlineexam INNER JOIN faculty ON faculty.id = onlineexam.facultyid INNER JOIN department ON department.id = onlineexam.departmentid INNER JOIN class ON class.id = onlineexam.classid INNER JOIN subject ON subject.id = onlineexam.subjectid INNER JOIN teacher ON teacher.id = onlineexam.teacherid ORDER BY onlineexam.id ASC");
$query8 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");