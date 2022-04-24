<?php
include_once('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT student.id, student.SfirstName, student.SlastName FROM student WHERE student.classid LIKE '%" .$_POST['student']. "%' ORDER BY student.id ASC");
$output = '<option></option>';
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {
        $output .= '<option value="'. $row['id'] .'">'. $row['SfirstName'] ." ". $row['SlastName'].'</option>';
    }
    echo $output;
}else{echo $output .='<option>There are no students in this class</option>';}