<?php
mysqli_select_db($DBCONNECTION,$database);
$GetTeacherID = mysqli_query($DBCONNECTION,"SELECT teacher.id FROM teacher INNER JOIN users ON users.id = teacher.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$teacherID = mysqli_fetch_assoc($GetTeacherID);
$OnlineExam = mysqli_query($DBCONNECTION,"SELECT onlineexam.id, onlineexam.teacherid, faculty.facultyName, department.departmentName, class.className, subject.subname FROM onlineexam INNER JOIN faculty ON faculty.id = onlineexam.facultyid INNER JOIN department ON department.id = onlineexam.departmentid INNER JOIN class ON class.id = onlineexam.classid INNER JOIN subject ON subject.id = onlineexam.subjectid INNER JOIN teacher ON teacher.id = onlineexam.teacherid WHERE onlineexam.teacherid=" . $teacherID['id']);