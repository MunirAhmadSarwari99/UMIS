<?php
mysqli_select_db($DBCONNECTION, $database);
if ($_SESSION["loginLevel"] == 0 || $_SESSION["loginLevel"] == 1) {
    $result = mysqli_query($DBCONNECTION, "
SELECT users.id, users.email, users.level, users.photo, users.statue, roles.admin, roles.hr, roles.finance, roles.logistic, permissions.create1, permissions.reed1, permissions.edit1, permissions.delete1, staff.firstName, staff.lastName, staff.year, staff.mounth, staff.day, staff.gender, staff.pcity, staff.ccity, staff.nic, staff.phone, staff.position, staff.image, staff.regdate
 FROM ((users
 INNER JOIN staff ON staff.userid = users.id)
 INNER JOIN roles ON roles.userid = users.id)
 INNER JOIN permissions ON permissions.userid = users.id 
 WHERE users.id =" . $_SESSION["loginSuccessID"]) or die(mysqli_error());
 $Auth = mysqli_fetch_assoc($result);
}elseif ($_SESSION["loginLevel"] == 1 || $_SESSION["loginLevel"] == 1){

}elseif ($_SESSION["loginLevel"] == 2 || $_SESSION["loginLevel"] == 1){
    $result = mysqli_query($DBCONNECTION, "SELECT users.id, users.firstName, users.lastName, users.email, users.level, users.photo, users.statue, faculty.facultyName, department.departmentName, teacher.fatherName, teacher.year, teacher.mounth, teacher.day, teacher.gender, teacher.ccity, teacher.pcity, teacher.nic, teacher.phone, teacher.image, teacher.regdate, teacher.degree FROM ((users INNER JOIN teacher on teacher.userid = users.id) INNER JOIN faculty ON faculty.id = teacher.facultyid) INNER JOIN department ON department.id = teacher.departmentid WHERE users.id     =" . $_SESSION["loginSuccessID"]) or die(mysqli_error());
    $Auth = mysqli_fetch_assoc($result);
}elseif ($_SESSION["loginLevel"] == 3 || $_SESSION["loginLevel"] == 1){
    $result = mysqli_query($DBCONNECTION, "SELECT users.id, users.firstName, users.lastName, users.email, users.level, users.photo, users.statue, faculty.facultyName, department.departmentName, class.className, class.semester, student.SfatherName, student.year, student.mounth, student.day, student.gender, student.ccity, student.pcity, student.nic, student.phone, student.image, student.school, student.graduationYear, student.KankorNo, student.regdate  FROM ((users INNER JOIN student on student.userid = users.id) INNER JOIN faculty ON faculty.id = student.facultyid) INNER JOIN department ON department.id = student.departmentid INNER JOIN class ON class.id = student.classid WHERE users.id     =" . $_SESSION["loginSuccessID"]) or die(mysqli_error());
    $Auth = mysqli_fetch_assoc($result);
}
