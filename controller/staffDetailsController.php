<?php
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    $query = mysqli_query($DBCONNECTION,"
SELECT staff.id, users.email, faculty.facultyName, staff.firstName, staff.lastName, staff.year, staff.year, staff.mounth, staff.day, staff.gender, staff.pcity, staff.ccity, staff.nic,  staff.phone, staff.position, staff.image, staff.regdate 
 FROM staff
 INNER JOIN users ON users.id = staff.userid
 INNER JOIN faculty ON faculty.id = staff.facultyid  
 WHERE staff.id =". $_GET['id']);
    $result = mysqli_fetch_assoc($query);

    $query2 = mysqli_query($DBCONNECTION,"SELECT * FROM staffsalary WHERE staffsalary.staffid =". $_GET['id']);

    $query3 = mysqli_query($DBCONNECTION,"SELECT * FROM staffattendance WHERE staffattendance.staffid =". $_GET['id']);
}