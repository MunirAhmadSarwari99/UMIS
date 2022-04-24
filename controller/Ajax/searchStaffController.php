<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT staff.id, users.email, staff.firstName, staff.lastName, staff.gender, staff.image, staff.phone FROM staff INNER JOIN users ON users.id = staff.userid WHERE users.email LIKE '%" .$_POST['search']. "%' OR  staff.firstName LIKE '%" .$_POST['search']. "%' OR  staff.lastName LIKE '%" .$_POST['search']. "%' OR  staff.phone LIKE '%" .$_POST['search']. "%'");

$output = '';
$gender = '';
$img = '';
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {


        if ($row['gender'] == 0) {$gender = 'Male';}
        else {$gender = 'Female';}

        if ($row['image'] == 'default.png'){$img = '../public/images/'.$row['image'];}
        else{$img = '../public/Storage/Staff/'.$row['image'];}
        $output .='<tr>';
        $output .='<td><img class="img-circle width-1" src="'.$img.'" alt="" /></td>';
        $output .='<td>'. $row['firstName'] .'</td>';
        $output .='<td>'. $row['lastName'] .'</td>';
        $output .='<td>'. $row['email'] .'</td>';
        $output .='<td>'. $gender .'</td>';
        $output .='<td>'. $row['phone'] .'</td>';
        $output .='<td class="setting text-right"><a href="../views/staffdetails.php?id='.$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show Row Details"><i class="fa fa-eye"></i></a><a href="../controller/deleteStaffController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}