<?php
include_once('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$class = mysqli_query($DBCONNECTION,"SELECT class.id, class.className, class.semester, faculty.facultyName, department.departmentName FROM class INNER JOIN faculty ON faculty.id = class.facultyid INNER JOIN department ON department.id = class.departmentid WHERE class.className LIKE '%" .$_POST['search']. "%' OR class.semester LIKE '%" .$_POST['search']. "%' OR faculty.facultyName LIKE '%" .$_POST['search']. "%' OR department.departmentName LIKE '%" .$_POST['search']. "%'");
$output = '';
if (mysqli_num_rows($class) > 0){
    while ($row = mysqli_fetch_assoc($class)) {
        $output .='<tr id="'. $row['id'] .'">';
        $output .='<td data-target="className">'. $row['className'] .'</td>';
        $output .='<td data-target="facultyName">'. $row['facultyName'] .'</td>';
        $output .='<td data-target="departmentName">'. $row['departmentName'] .'</td>';
        $output .='<td data-target="semester">'. $row['semester'] .'</td>';
        $output .='<td class="setting text-right"><a href="javascript:void(0);" data-role="EditClass" data-id="'. $row['id'] .'" class="btn btn-icon-toggle" data-toggle="modal" data-target="#myModal" data-placement="top" data-original-title="Edit Row"><i class="md md-edit"></i></a><a href="../controller/deleteClassController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}