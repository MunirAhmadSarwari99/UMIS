<?php
include_once('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT department.id, department.departmentName FROM department INNER JOIN faculty ON faculty.id = department.facultyid WHERE department.facultyid LIKE '%" .$_POST['department']. "%'");
$output = '<option></option>';
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {
        $output .= '<option value="'. $row['id'] .'">'. $row['departmentName'] .'</option>';
    }
    echo $output;
}