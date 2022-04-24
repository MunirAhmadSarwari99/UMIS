<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$department = mysqli_query($DBCONNECTION,"SELECT department.id, department.departmentName FROM department INNER JOIN faculty ON department.facultyid = faculty.id WHERE department.facultyid LIKE '%" .$_POST['faculty']. "%'") or die(mysqli_error());
$output = '';
$msg = 'This Faculty Don`t Have a Department';
if (mysqli_num_rows($department) > 0){
    $output .= '<option value=""></option>';
    while ($row = mysqli_fetch_assoc($department)) {
            $output .= '<option value="'. $row['id'] .'">'. $row['departmentName'] .'</option>';
    }
    echo $output;
}else{
    echo $output .='<option>'.$msg.'</option>';
}