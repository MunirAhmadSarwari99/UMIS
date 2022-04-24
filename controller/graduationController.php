<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query1 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student ORDER BY student.id ASC");
$query2 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");
$query3 = mysqli_query($DBCONNECTION,"SELECT graduation.id, student.SfirstName, student.SlastName, faculty.facultyName, department.departmentName, graduation.graddate FROM graduation INNER JOIN student ON student.id = graduation.studentid INNER JOIN faculty ON faculty.id = graduation.facultyid INNER JOIN department ON department.id = graduation.departmentid ORDER BY  graduation.id ASC");
$query4 = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student ORDER BY student.id ASC");
$query5 = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName FROM faculty ORDER BY faculty.id ASC");