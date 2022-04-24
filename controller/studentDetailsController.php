<?php
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    $query = mysqli_query($DBCONNECTION,"
SELECT student.id, users.email, faculty.facultyName, department.departmentName, class.className, student.SfirstName, student.SfatherName, student.SlastName, student.year, student.year, student.mounth, student.day, student.gender, student.pcity, student.ccity, student.nic,  student.phone, student.image, student.school, student.graduationYear, student.KankorNo, student.regdate
 FROM student
 INNER JOIN users ON users.id = student.userid 
 INNER JOIN faculty ON faculty.id = student.facultyid 
 INNER JOIN department ON department.id = student.departmentid 
 INNER JOIN class ON class.id = student.classid 
 WHERE student.id =". $_GET['id']);
    $result = mysqli_fetch_assoc($query);

    $query1 = mysqli_query($DBCONNECTION,"SELECT studentatt.id, student.SfirstName, student.SlastName,  studentatt.attYear,  studentatt.attMonth,  studentatt.attday,  studentatt.attr FROM studentatt INNER JOIN student ON student.id = studentatt.studentid WHERE studentatt.studentid=". $_GET['id']);

    $query2 = mysqli_query($DBCONNECTION,"SELECT studentschedule.id, studentschedule.day,  studentschedule.starttime, 
studentschedule.endtime, student.SfirstName, student.SlastName, faculty.facultyName, department.departmentName, class.className, subject.subname 
FROM studentschedule 
INNER JOIN student ON student.id = studentschedule.studentid 
INNER JOIN faculty ON faculty.id = studentschedule.facultyid 
INNER JOIN department ON department.id = studentschedule.departmentid 
INNER JOIN class ON class.id = studentschedule.classid 
INNER JOIN subject ON subject.id = studentschedule.subjectid WHERE studentschedule.studentid =". $_GET['id']);
}