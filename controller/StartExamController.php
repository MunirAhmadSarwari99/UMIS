<?php
mysqli_select_db($DBCONNECTION,$database);
$GetStudentID = mysqli_query($DBCONNECTION,"SELECT student.id, student.classid FROM student INNER JOIN users ON users.id = student.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
$StudentID = mysqli_fetch_assoc($GetStudentID);
$ExamDetails = mysqli_query($DBCONNECTION,"SELECT faculty.facultyName, department.departmentName, class.className, subject.subname, teacher.firstName, teacher.lastName, onlineexam.id, onlineexam.examlevel, onlineexam.examChanse, onlineexam.examyDate FROM onlineexam INNER JOIN faculty ON faculty.id = onlineexam.facultyid INNER JOIN department ON department.id = onlineexam.departmentid INNER JOIN class ON class.id = onlineexam.classid INNER JOIN subject ON subject.id = onlineexam.subjectid INNER JOIN teacher ON teacher.id = onlineexam.teacherid WHERE onlineexam.subjectid =". $_GET['SubjectID']) or die(mysqli_error($DBCONNECTION));
$Exam = mysqli_query($DBCONNECTION,"SELECT examaq.id, examaq.Question, examaq.Answer1, examaq.Answer2, examaq.Answer3, examaq.Answer4, examaq.RightAnswer, examaq.Score FROM examaq INNER JOIN onlineexam ON onlineexam.id = examaq.onlineExamid WHERE onlineexam.subjectid =". $_GET['SubjectID']);