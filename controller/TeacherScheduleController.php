<?php
mysqli_select_db($DBCONNECTION,$database);
$GetTeacherID = mysqli_query($DBCONNECTION,"SELECT teacher.id FROM teacher INNER JOIN users ON users.id = teacher.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$teacherID = mysqli_fetch_assoc($GetTeacherID);

$Schedule = mysqli_query($DBCONNECTION,"SELECT teacherschedule.id, teacherschedule.day,  teacherschedule.starttime, 
teacherschedule.endtime, faculty.facultyName, department.departmentName, class.className, subject.subname 
FROM teacherschedule 
INNER JOIN faculty ON faculty.id = teacherschedule.facultyid 
INNER JOIN department ON department.id = teacherschedule.departmentid 
INNER JOIN class ON class.id = teacherschedule.classid 
INNER JOIN subject ON subject.id = teacherschedule.subjectid WHERE teacherschedule.teacherid  =" . $teacherID['id']);