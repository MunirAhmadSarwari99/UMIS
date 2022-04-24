<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$class = mysqli_query($DBCONNECTION,"SELECT class.id, class.className, class.semester, faculty.facultyName, department.departmentName FROM class INNER JOIN faculty ON faculty.id = class.facultyid INNER JOIN department ON department.id = class.departmentid");