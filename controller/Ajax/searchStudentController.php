<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT student.id, users.email, student.SfirstName, student.SlastName, student.gender, student.image, student.phone FROM student INNER JOIN users ON users.id = student.userid WHERE users.email LIKE '%" .$_POST['search']. "%' OR  student.SfirstName LIKE '%" .$_POST['search']. "%' OR  student.SlastName LIKE '%" .$_POST['search']. "%' OR  student.phone LIKE '%" .$_POST['search']. "%'");

$output = '';
$gender = '';
$img = '';
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {


        if ($row['gender'] == 0) {$gender = 'Male';}
        else {$gender = 'Female';}

        if ($row['image'] == 'default.png'){$img = '../public/images/'.$row['image'];}
        else{$img = '../public/Storage/Student/'.$row['image'];}
        $output .='<tr>';
        $output .='<td><img class="img-circle width-1" src="'.$img.'" alt="" /></td>';
        $output .='<td>'. $row['SfirstName'] .'</td>';
        $output .='<td>'. $row['SlastName'] .'</td>';
        $output .='<td>'. $row['email'] .'</td>';
        $output .='<td>'. $gender .'</td>';
        $output .='<td>'. $row['phone'] .'</td>';
        $output .='<td class="setting text-right"><a href="../views/studentdetails.php?id='.$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show Row Details"><i class="fa fa-eye"></i></a><a href="../controller/deleteStudentController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}