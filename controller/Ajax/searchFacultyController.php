<?php
include_once('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$faculty = mysqli_query($DBCONNECTION,"SELECT faculty.id, faculty.facultyName, faculty.facultydate FROM faculty WHERE faculty.facultyName LIKE '%" .$_POST['search']. "%' OR faculty.facultydate LIKE '%" .$_POST['search']. "%'");
$output = '';
if (mysqli_num_rows($faculty) > 0){
    while ($row = mysqli_fetch_assoc($faculty)) {
        $output .='<tr>';
        $output .='<td>'. $row['facultyName'] .'</td>';
        $output .='<td>'. $row['facultydate'] .'</td>';
        $output .='<td class="setting text-right"><a href="../views/facultydetails.php?id='.$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show Departments"><i class="fa fa-eye"></i></a><a href="../controller/deleteFacultyController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}