<?php
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
    include_once('../database/DBConnect.php');
    mysqli_select_db($DBCONNECTION, $database);
    $query1 = mysqli_query($DBCONNECTION, "SELECT faculty.id, faculty.facultyName, faculty.facultydate FROM faculty WHERE id =" . $_GET['id']);
    $faculty = mysqli_fetch_assoc($query1);

    $department = mysqli_query($DBCONNECTION, "SELECT department.id, department.departmentName, department.regdate FROM department INNER JOIN faculty ON department.facultyid = faculty.id WHERE department.facultyid =" . $faculty['id']);
}