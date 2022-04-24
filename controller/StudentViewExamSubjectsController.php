<?php
mysqli_select_db($DBCONNECTION,$database);
$GetStudentID = mysqli_query($DBCONNECTION,"SELECT student.id, student.classid FROM student INNER JOIN users ON users.id = student.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$StudentID = mysqli_fetch_assoc($GetStudentID);
$Subjects = mysqli_query($DBCONNECTION,"SELECT studentschedule.subjectid, subject.subname FROM studentschedule INNER JOIN subject ON subject.id = studentschedule.subjectid WHERE studentschedule.studentid =" . $StudentID["id"]);