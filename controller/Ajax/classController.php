<?php
include_once('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$class = mysqli_query($DBCONNECTION,"SELECT class.id, class.className FROM class INNER JOIN department ON department.id = class.departmentid WHERE class.departmentid LIKE '%" .$_POST['department']. "%'");
$output = '<option></option>';
$msg = 'This Department Don`t Have a Class';
if (mysqli_num_rows($class) > 0){
    while ($row = mysqli_fetch_assoc($class)) {
        $output .= '<option value="'. $row['id'] .'">'. $row['className'] .'</option>';
    }
    echo $output;
}else{
    echo $output .='<option>'.$msg.'</option>';
}