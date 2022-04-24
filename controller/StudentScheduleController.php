<?php
mysqli_select_db($DBCONNECTION,$database);
$GetStudentID = mysqli_query($DBCONNECTION,"SELECT student.id FROM student INNER JOIN users ON users.id = student.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$StudentID = mysqli_fetch_assoc($GetStudentID);

$Schedule = mysqli_query($DBCONNECTION,"SELECT studentschedule.id, studentschedule.day,  studentschedule.starttime, 
studentschedule.endtime, faculty.facultyName, department.departmentName, class.className, subject.subname 
FROM studentschedule 
INNER JOIN faculty ON faculty.id = studentschedule.facultyid 
INNER JOIN department ON department.id = studentschedule.departmentid 
INNER JOIN class ON class.id = studentschedule.classid 
INNER JOIN subject ON subject.id = studentschedule.subjectid WHERE studentschedule.studentid  =" . $StudentID['id']);