<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT teacher.id, users.email, teacher.firstName, teacher.lastName, teacher.gender, teacher.image, teacher.phone FROM teacher INNER JOIN users ON users.id = teacher.userid WHERE users.email LIKE '%" .$_POST['search']. "%' OR  teacher.firstName LIKE '%" .$_POST['search']. "%' OR  teacher.lastName LIKE '%" .$_POST['search']. "%' OR  teacher.phone LIKE '%" .$_POST['search']. "%'");

$output = '';
$gender = '';
$img = '';
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {


        if ($row['gender'] == 0) {$gender = 'Male';}
        else {$gender = 'Female';}

        if ($row['image'] == 'default.png'){$img = '../public/images/'.$row['image'];}
        else{$img = '../public/Storage/Teacher/'.$row['image'];}
        $output .='<tr>';
        $output .='<td><img class="img-circle width-1" src="'.$img.'" alt="" /></td>';
        $output .='<td>'. $row['firstName'] .'</td>';
        $output .='<td>'. $row['lastName'] .'</td>';
        $output .='<td>'. $row['email'] .'</td>';
        $output .='<td>'. $gender .'</td>';
        $output .='<td>'. $row['phone'] .'</td>';
        $output .='<td class="setting text-right"><a href="../views/teacherdetails.php?id='.$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show Row Details"><i class="fa fa-eye"></i></a><a href="../controller/deleteTeacherController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}