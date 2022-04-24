<?php
mysqli_select_db($DBCONNECTION,$database);
$GetStudentID = mysqli_query($DBCONNECTION,"SELECT student.id FROM student INNER JOIN users ON users.id = student.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$StudentID = mysqli_fetch_assoc($GetStudentID);
$attendance = mysqli_query($DBCONNECTION,"SELECT studentatt.attYear, studentatt.attMonth, studentatt.attday, studentatt.attr FROM studentatt INNER JOIN student ON student.id = studentatt.studentid WHERE studentatt.studentid ="  . $StudentID["id"]);