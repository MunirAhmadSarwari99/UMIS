<?php
mysqli_select_db($DBCONNECTION,$database);
$GetTeacherID = mysqli_query($DBCONNECTION,"SELECT teacher.id FROM teacher INNER JOIN users ON users.id = teacher.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$TeacherID = mysqli_fetch_assoc($GetTeacherID);
$attendance = mysqli_query($DBCONNECTION,"SELECT teacherattr.attYear, teacherattr.attMonth, teacherattr.attday, teacherattr.attr FROM teacherattr INNER JOIN teacher ON teacher.id = teacherattr.teacherid WHERE teacherattr.teacherid ="  . $TeacherID["id"]);