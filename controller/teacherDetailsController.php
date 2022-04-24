<?php
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    $query = mysqli_query($DBCONNECTION,"
SELECT teacher.id, users.email, faculty.facultyName, department.departmentName, teacher.firstName, teacher.fatherName, teacher.lastName, teacher.year, teacher.year, teacher.mounth, teacher.day, teacher.gender, teacher.pcity, teacher.ccity, teacher.nic,  teacher.phone, teacher.image, teacher.regdate, teacher.degree 
 FROM teacher
 INNER JOIN users ON users.id = teacher.userid 
 INNER JOIN faculty ON faculty.id = teacher.facultyid 
 INNER JOIN department ON department.id = teacher.departmentid 
 WHERE teacher.id =". $_GET['id']);
    $result = mysqli_fetch_assoc($query);

    $query2 = mysqli_query($DBCONNECTION,"SELECT * FROM teachersalary WHERE teachersalary.teacherid =". $_GET['id']);

    $query3 = mysqli_query($DBCONNECTION,"SELECT * FROM teacherattr WHERE teacherattr.teacherid =". $_GET['id']);
}

$query5 = mysqli_query($DBCONNECTION,"SELECT teacherschedule.id, teacherschedule.day,  teacherschedule.starttime, 
teacherschedule.endtime, teacher.firstName, teacher.lastName, faculty.facultyName, department.departmentName, class.className, subject.subname 
FROM teacherschedule 
INNER JOIN teacher ON teacher.id = teacherschedule.teacherid 
INNER JOIN faculty ON faculty.id = teacherschedule.facultyid 
INNER JOIN department ON department.id = teacherschedule.departmentid 
INNER JOIN class ON class.id = teacherschedule.classid 
INNER JOIN subject ON subject.id = teacherschedule.subjectid WHERE teacherschedule.teacherid  =". $_GET['id']);